<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentTransaction;

class TransactionController extends Controller
{
    public function index()
{
    $transactions = PaymentTransaction::with(['user', 'paymentMethod', 'discount'])
                                      ->orderBy('created_at', 'asc')
                                      ->paginate(15);

    return view('transactions.index', compact('transactions'));
}

}