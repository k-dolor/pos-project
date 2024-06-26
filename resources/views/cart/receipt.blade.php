@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid p-0" style="margin-left: 80px; margin-right: 10px;">
    <div class="card"
    style="position: relative; margin-top: 5px; background-color: rgba(208, 208, 208, 0.97); color: #261f1f">
    <div class="card-header d-flex justify-content-between align-items-center"
        style="background-color: rgba(138, 142, 148, 0.95s); color: rgb(13, 31, 47); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Receipt</h5>
        </div>
        <div class="card-body">
            <h3>Receipt Details</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->product->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₱{{ number_format($item->product->price, 2) }}</td>
                            <td>{{ $item->discount ?? 0 }}%</< /td>
                            <td>₱{{ number_format($item->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Total Amount: ₱{{ number_format($totalAmount, 2) }}</h4>
            <h4>Total Discount: ₱{{ number_format($totalDiscount, 2) }}</h4>
            <h4>Payable Amount: ₱{{ number_format($payableAmount, 2) }}</h4>
            <h4>Amount Paid: ₱{{ number_format($amountPaid, 2) }}</h4>
            <h4>Change: ₱{{ number_format($change, 2) }}</h4>
            <div class="display-flex justify-flex-end">
                <button type="" onclick="window.print()"
                    class="button-primary text-color-white border-radius-medium padding-button-2 margin-top-1 margin-bottom-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                      </svg> Print Receipt
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
