@extends('layout.main')
@include('include.bg')
@include('include.sidebar')

@section('content')


<div class="container-fluid p-0" style="margin-left: 75px; margin-right: 5px; padding-top: 20px;">
        <!-- Main card for the table -->
        <div class="card" style="background-color: rgba(213, 217, 219, 0.5);  font-family: 'Metropolis';">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(138, 142, 148, 0.95); border-bottom: none;">
                <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 38px;">Payment Transactions</h5>
            </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>User ID</th>
                    <th>Payment Method ID</th>
                    <th>Discount ID</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentTransactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->user_id }}</td>
                        <td>{{ $transaction->payment_method_id }}</td>
                        <td>{{ $transaction->discount_id }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

 @endsection
