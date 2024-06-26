@extends('layout.main')
@include('include.bg')
@include('include.sidebar')

@section('content')

<div class="container-fluid p-0" style="margin-left: 75px; margin-right: 5px; padding-top: 20px;">
    <!-- Main card for the table -->
    <div class="card mt-2"
        style="background-color: rgba(213, 211, 211, 0.99); font-family: 'Metropolis';color: #000000">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="background-color: rgba(64, 64, 64, 0.65); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 35px">Transaction History</h5>
        </div>

        <div class="table-responsive mt-2">
            <!-- Table Content -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Payment Method</th>
                        <th>Discount</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ optional($transaction->user)->first_name }}
                                {{ optional($transaction->user)->last_name }}</td>
                            <td>{{ optional($transaction->paymentMethod)->payment_method_name }}</td>
                            <td>{{ optional($transaction->discount)->discount_name }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>{{ $transaction->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection