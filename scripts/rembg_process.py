#!/usr/bin/env python3
"""
rembg_process.py — rembg + alpha refinement

Usage:
  rembg_process.py input.jpg output.png [--blur 2.0] [--hard-thresh 220] [--boost-gamma 0.95] [--sharpen 0.0]

Options:
  --blur FLOAT         Radius (px) for alpha gaussian blur applied to the 'unknown' region. Default 2.0
  --hard-thresh INT    Pixel value [0..255]. Alpha values above this are forced fully opaque. Default 220
  --soft-thresh INT    Pixel value [0..255]. Alpha values below this are forced fully transparent. Default 20
  --boost-gamma FLOAT  Gamma to apply to alpha for contrast (values <1 make foreground more opaque). Default 0.95
  --sharpen FLOAT      Amount of UnsharpMask to apply to RGB channels where alpha high. 0 disables. Default 0.0
  --debug              Print diagnostic progress to stdout/stderr
"""

import os
import sys
import traceback
import argparse

# IMPORTANT: set these BEFORE importing rembg / numpy / numba / scipy
os.environ['OPENBLAS_NUM_THREADS'] = os.environ.get('OPENBLAS_NUM_THREADS', '1')
os.environ['OMP_NUM_THREADS'] = os.environ.get('OMP_NUM_THREADS', '1')
os.environ['MKL_NUM_THREADS'] = os.environ.get('MKL_NUM_THREADS', '1')
os.environ['NUMBA_NUM_THREADS'] = os.environ.get('NUMBA_NUM_THREADS', '1')

try:
    from rembg import remove
    from PIL import Image, ImageFilter, ImageChops, ImageOps
    import numpy as np
except Exception as e:
    sys.stderr.write("IMPORT_ERROR: {}\n".format(e))
    traceback.print_exc(file=sys.stderr)
    sys.exit(2)

def refine_alpha(pil_img_rgba, blur_radius=2.0, hard_thresh=220, soft_thresh=20, boost_gamma=0.95, debug=False):
    """
    pil_img_rgba: PIL.Image RGBA
    Returns: PIL.Image RGBA with refined/cleaned alpha channel
    """
    if pil_img_rgba.mode != 'RGBA':
        pil_img_rgba = pil_img_rgba.convert('RGBA')

    # Split channels
    r, g, b, a = pil_img_rgba.split()

    if debug:
        print(f"[debug] alpha mode: {a.mode}, size: {a.size}", file=sys.stderr)

    # Convert to numpy array for numeric ops
    alpha = np.asarray(a).astype(np.float32)  # 0..255 float

    # 1) Basic gamma/contrast on alpha to make foreground stronger
    if boost_gamma is not None and boost_gamma > 0:
        # gamma < 1 will make midtones brighter (more opaque)
        gamma = float(boost_gamma)
        alpha /= 255.0
        alpha = np.clip(alpha, 0.0, 1.0)
        alpha = (alpha ** gamma) * 255.0
        alpha = np.clip(alpha, 0.0, 255.0)

    # 2) Create PIL alpha image and blur it (smoothing small artifacts)
    alpha_img = Image.fromarray(alpha.astype(np.uint8), mode='L')
    if blur_radius and blur_radius > 0:
        alpha_blurred = alpha_img.filter(ImageFilter.GaussianBlur(radius=float(blur_radius)))
    else:
        alpha_blurred = alpha_img

    # 3) Enforce hard interior / background to remove faint halos:
    #    - Fully opaque where original alpha is above hard_thresh
    #    - Fully transparent where original alpha is below soft_thresh
    orig_alpha = np.asarray(a).astype(np.uint8)
    hard_mask = Image.fromarray(((orig_alpha >= int(hard_thresh)) * 255).astype(np.uint8), mode='L')
    soft_mask = Image.fromarray(((orig_alpha <= int(soft_thresh)) * 255).astype(np.uint8), mode='L')

    # Merge: ensure hard_mask areas are fully opaque, soft_mask areas fully transparent.
    # Use ImageChops.lighter to keep blurred edge but ensure interior maxed out
    ensured = ImageChops.lighter(alpha_blurred, hard_mask)  # interior becomes opaque
    # force background to 0 where soft_mask is True
    ensured_np = np.asarray(ensured).astype(np.uint8)
    ensured_np[ np.asarray(soft_mask) == 255 ] = 0
    final_alpha = Image.fromarray(ensured_np, mode='L')

    # 4) Optional one-pixel erosion/dilation to clean tiny specks (useful for noisy masks)
    #    We'll do a slight morphological opening if needed using filters (size 3).
    #    Keep small operations so details (hair) are not lost.
    # tiny_open = final_alpha.filter(ImageFilter.MinFilter(3)).filter(ImageFilter.MaxFilter(3))
    # final_alpha = tiny_open

    if debug:
        print("[debug] alpha stats: min=%d max=%d mean=%.1f" % (np.min(np.asarray(final_alpha)), np.max(np.asarray(final_alpha)), np.mean(np.asarray(final_alpha))), file=sys.stderr)

    # 5) Put refined alpha back onto RGB
    result = Image.merge('RGBA', (r, g, b, final_alpha))
    return result

def sharpen_rgb_where_foreground(img_rgba, radius=2, percent=150, threshold=3, debug=False):
    """
    Apply unsharp mask (PIL.UnsharpMask) to the whole image but mask it to only foreground,
    so background remains untouched. Parameters mimic PIL.UnsharpMask.
    - percent is strength, threshold is detail threshold (we'll use default style numbers)
    """
    if img_rgba.mode != 'RGBA':
        img_rgba = img_rgba.convert('RGBA')

    # Separate alpha and RGB
    rgb = img_rgba.convert('RGB')
    alpha = img_rgba.split()[3]

    # Apply UnsharpMask to RGB
    if percent <= 0:
        return img_rgba

    sharpened = rgb.filter(ImageFilter.UnsharpMask(radius=radius, percent=int(percent), threshold=int(threshold)))

    # Composite sharpened RGB over original using alpha as mask
    composed = Image.composite(sharpened, rgb, alpha)
    composed.putalpha(alpha)
    if debug:
        print("[debug] applied unsharp mask to foreground", file=sys.stderr)
    return composed

def main():
    parser = argparse.ArgumentParser(description='rembg + alpha refinement')
    parser.add_argument('input', help='input image path')
    parser.add_argument('output', help='output png path')
    parser.add_argument('--blur', type=float, default=2.0, help='alpha gaussian blur radius (px)')
    parser.add_argument('--hard-thresh', type=int, default=220, help='alpha > this becomes fully opaque (0-255)')
    parser.add_argument('--soft-thresh', type=int, default=20, help='alpha <= this becomes fully transparent (0-255)')
    parser.add_argument('--boost-gamma', type=float, default=0.95, help='gamma applied to alpha (<1 makes FG stronger)')
    parser.add_argument('--sharpen', type=float, default=0.0, help='apply UnsharpMask to foreground (0 disables)')
    parser.add_argument('--debug', action='store_true', help='print debug info')
    args = parser.parse_args()

    input_path = args.input
    output_path = args.output

    if not os.path.isfile(input_path):
        sys.stderr.write("ERROR: input file not found: {}\n".format(input_path))
        sys.exit(3)

    try:
        # Open and ensure RGBA
        inp = Image.open(input_path)
        if inp.mode != 'RGBA':
            inp = inp.convert('RGBA')

        if args.debug:
            print(f"[debug] opened input {input_path} size={inp.size} mode={inp.mode}", file=sys.stderr)

        # Primary background removal
        out = remove(inp)   # rembg does the heavy lifting

        # Ensure RGBA
        if hasattr(out, 'mode') and out.mode != 'RGBA':
            out = out.convert('RGBA')

        # Refine alpha for cleaner transparent PNG
        refined = refine_alpha(out,
                               blur_radius=args.blur,
                               hard_thresh=args.hard_thresh,
                               soft_thresh=args.soft_thresh,
                               boost_gamma=args.boost_gamma,
                               debug=args.debug)

        # Optional sharpen of foreground RGB
        if args.sharpen and float(args.sharpen) > 0.0:
            # percent param maps to 'percent' argument of UnsharpMask
            sharpen_percent = float(args.sharpen) * 100.0 if float(args.sharpen) <= 2.0 else float(args.sharpen)
            refined = sharpen_rgb_where_foreground(refined, radius=1, percent=sharpen_percent, threshold=2, debug=args.debug)

        # Ensure output directory exists
        out_dir = os.path.dirname(os.path.abspath(output_path))
        if out_dir and not os.path.isdir(out_dir):
            os.makedirs(out_dir, exist_ok=True)

        # Save as PNG with transparency
        refined.save(output_path, format='PNG')
        sys.stdout.write("OK: saved {}\n".format(output_path))
        sys.exit(0)

    except Exception as e:
        sys.stderr.write("PROCESS_ERROR: {}\n".format(e))
        traceback.print_exc(file=sys.stderr)
        try:
            if os.path.exists(output_path):
                os.remove(output_path)
        except Exception:
            pass
        sys.exit(4)

if __name__ == '__main__':
    main()
