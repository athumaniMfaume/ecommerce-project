<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    public function handleCallback(Request $request)
    {
        Log::info('M-PESA Callback:', $request->all());

        // You can store the transaction or verify it here.
        return response()->json(['message' => 'Callback received'], 200);
    }
}
