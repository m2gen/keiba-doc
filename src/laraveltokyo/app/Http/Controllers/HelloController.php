<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{

    public function top()
    {
        return view('top');
    }

    public function recovery_view()
    {
        return view('recovery');
    }

    public function recovery(Request $request)
    {
        $purchase = $request->input('purchase');
        $refund = $request->input('refund');

        $recovery_A = $purchase != 0 ? number_format($refund / $purchase, 2) : 0;
        $recovery_B = $purchase != 0 ? round($refund / $purchase * 100) : 0;

        return view('recovery', compact('recovery_A', 'recovery_B'));
    }
}
