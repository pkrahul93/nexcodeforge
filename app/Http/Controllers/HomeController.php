<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get all active promotions as a collection
        $activePromotions = Promotion::where('status', 1)->latest()->get();
        return view('guest.index', compact('activePromotions'));
    }

    public function setCookie(Request $request)
    {
        $id = $request->id;
        if ($id) {
            // Cookie for 1 day
            return response()->json(['success' => true])->cookie('promo_seen_' . $id, true, 1440);
        }
        return response()->json(['success' => false], 400);
    }

}
