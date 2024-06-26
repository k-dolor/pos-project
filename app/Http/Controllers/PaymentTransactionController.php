<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransaction;
use Illuminate\Http\Request;

class PaymentTransactionController extends Controller
{
    public function index()
    {
        $paymentTransactions = PaymentTransaction::all();
        return view('payment_transactions.index', compact('paymentTransactions'));
    }
}

