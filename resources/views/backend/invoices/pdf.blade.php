<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $invoice->number ?? '—' }}</title>
    <style>
        /**
         * Important:
         * - Make footer height explicit (footerHeight)
         * - Make @page bottom margin >= footer height (in mm)
         * - Make body padding-bottom = footerHeight + safety
         *
         * Tweak footerHeight (px) and @page margin-bottom (mm) if you see any remaining gap.
         */

        /* === CONFIG (tweak if necessary) === */
        /* explicit footer height in px */
        :root {
            --footer-height: 50px; /* adjust if you change footer padding/line-height */
            --footer-safety: 6px;  /* extra breathing room */
        }

        /* Page margins (bottom margin must allow footer) */
        @page {
            margin: 0mm 10mm 14mm 10mm; /* bottom margin 14mm (increase if needed) */
        }

        /* Base body */
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            font-size: 12px;
            margin: 0;
            padding: 0;

            /* prevent content from going under the fixed footer */
            padding-bottom: calc(var(--footer-height) + var(--footer-safety));
            -webkit-print-color-adjust: exact;
            box-sizing: border-box;
        }

        .container {
            padding: 18px;
            /* ensure container doesn't add extra bottom space */
            padding-bottom: 0;
            box-sizing: border-box;
        }

        /* Header: left (brand) and right (meta) aligned vertically */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 14px;
            margin-bottom: 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand img {
            height: 60px;
            object-fit: contain;
        }

        .company-details {
            font-size: 12px;
            line-height: 1.3;
            color: #444;
        }

        .company-details strong {
            display: block;
            font-size: 14px;
            color: #0b5ed7;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-meta .label {
            font-size: 11px;
            color: #666;
        }

        .invoice-meta .number {
            font-size: 18px;
            font-weight: 700;
            color: #0b5ed7;
            margin-top: 4px;
        }

        /* Addresses row: left and right boxes */
        .addresses {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 18px;
            align-items: flex-start;
        }

        .address-box {
            width: 48%;
            padding: 10px;
            background: #fbfbfb;
        }

        .address-title {
            font-weight: 700;
            margin-bottom: 6px;
            color: #333;
        }

        /* Items */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        thead th {
            background: #f6f8fb;
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
            font-weight: 700;
        }

        tbody td {
            padding: 10px;
            border-bottom: 1px solid #f1f1f1;
            vertical-align: top;
        }

        .text-right {
            text-align: right;
        }

        .desc {
            white-space: pre-wrap;
        }

        /* Totals */
        .totals {
            width: 35%;
            float: right;
            margin-top: 12px;
            border-collapse: collapse;
        }

        .totals td {
            padding: 8px;
        }

        .totals .label {
            color: #555;
        }

        .totals .value {
            text-align: right;
            font-weight: 700;
        }

        /* Notes & signature */
        .notes {
            clear: both;
            margin-top: 12px;        /* make notes closer to totals/items */
            margin-bottom: 0;        /* IMPORTANT: remove bottom margin */
            padding: 12px;
            border-left: 4px solid #0b5ed7;
            background: #fafcff;
            page-break-inside: avoid; /* don't split notes across pages if possible */
        }

        .signature-block {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
        }

        .signature {
            width: 48%;
            text-align: left;
        }

        .signature .title {
            font-weight: 700;
            margin-bottom: 6px;
        }

        .signature .line {
            margin-top: 32px;
            border-top: 1px solid #ccc;
            width: 80%;
            padding-top: 6px;
            color: #666;
            font-size: 12px;
        }

        /* FIXED FOOTER */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;

            height: var(--footer-height);
            line-height: 1.2;
            box-sizing: border-box;

            width: 100%;
            text-align: center;
            font-size: 11px;
            color: #666;
            border-top: 1px dashed #e6e6e6;
            padding-top: 8px;
            padding-bottom: 6px;
            background: #fff; /* ensures footer background for pdf */
        }

        /* Renderer-specific tiny tweak: uncomment for dompdf if you still see 1-2px gap */
        /* .footer { bottom: -1px; } */

        /* small screens fallback for dompdf (works in server-side rendering) */
        @media (max-width:600px) {

            .addresses,
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .invoice-meta {
                text-align: left;
                margin-top: 10px;
            }

            .signature-block {
                flex-direction: column;
                align-items: flex-start;
            }

            .totals {
                width: 100%;
                float: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        {{-- HEADER: left brand + right meta (vertical aligned) --}}
        <div class="header">
            <table>
                <tr>
                    <td>
                        <div class="brand">
                            @if (file_exists(public_path('images/logo.png')))
                                <img src="{{ public_path('images/logo.png') }}" alt="Logo">
                            @else
                                <div style="font-weight:800; font-size:18px; color:#0b5ed7;">
                                    {{ config('app.name', 'Your Company') }}</div>
                            @endif

                            <div class="company-details">
                                <strong>{{ config('app.name', 'Your Company') }}</strong>
                                New Ashok-Nagar, East-Delhi – 110096<br>
                                Phone: +91 76691 66975<br>
                                Email: support@nexcodeforge.com<br>
                                GSTIN: 12ABCDE3456F7Z8
                            </div>
                        </div>
                    </td>
                    <td>
                        <br><br><br><br>
                        <div class="invoice-meta">
                            <div class="label">Invoice</div>
                            <div class="number">#{{ $invoice->number ?? '—' }}</div>
                            <div class="label" style="margin-top:6px;">
                                <div><strong>Issue Date :</strong>
                                    {{ optional($invoice->issue_date)->format('d M Y') ?? '—' }}</div>
                                <div><strong>Due Date :</strong>
                                    {{ optional($invoice->due_date)->format('d M Y') ?? '—' }}</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        {{-- ADDRESSES: bill to (left) and from (right), same row --}}
        <div class="addresses">
            <div class="address-box">
                <div class="address-title">Bill To</div>
                <div>
                    <strong>{{ $invoice->customer_name }}</strong><br>
                    @if ($invoice->customer_phone)
                        <span class="muted">Phone:</span> {{ $invoice->customer_phone }}<br>
                    @endif
                    @if ($invoice->customer_email)
                        <span class="muted">Email:</span> {{ $invoice->customer_email }}<br>
                    @endif
                    @if ($invoice->customer_address)
                        <span class="muted">Address:</span>{!! nl2br(e($invoice->customer_address)) !!}<br>
                    @endif
                </div>
            </div>
        </div>

        {{-- Items table --}}
        <div>
            <table>
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:55%;">Description</th>
                        <th style="width:10%;" class="text-right">Qty</th>
                        <th style="width:15%;" class="text-right">Unit</th>
                        <th style="width:15%;" class="text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->items as $index => $item)
                        <tr>
                            <td class="text-right">{{ $index + 1 }}</td>
                            <td class="desc">{{ $item->description }}</td>
                            <td class="text-right">{{ $item->quantity }}</td>
                            <td class="text-right">{{ number_format($item->unit_price, 2) }}</td>
                            <td class="text-right">{{ number_format($item->amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Totals --}}
            <table class="totals" align="right">
                <tbody>
                    <tr>
                        <td class="label">Subtotal : </td>
                        <td class="value">{{ number_format($invoice->subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Tax : </td>
                        <td class="value">{{ number_format($invoice->tax, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Discount : </td>
                        <td class="value">-{{ number_format($invoice->discount, 2) }}</td>
                    </tr>
                    <tr style="border-top:1px solid #ddd;">
                        <td class="label"><strong>Total : </strong></td>
                        <td class="value"><strong>{{ number_format($invoice->total, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>


        {{-- Notes --}}
        @if ($invoice->notes)
            <div class="notes">
                {!! nl2br(e($invoice->notes)) !!}
            </div>
        @endif

        {{-- Footer --}}
        <div class="footer">
            <strong>{{ config('app.name', 'Your Company') }}</strong> <br>
            201301 Noida, 3rd Floor, TechnoHub Building <br>
            Phone: +91 76691 66975 — Email: support@nexcodeforge.com
        </div>

    </div>
</body>

</html>
