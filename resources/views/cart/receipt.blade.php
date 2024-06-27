@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid d-flex justify-content-center" style="padding: 0;">
    <div class="card"
    style="margin-top: 20px; background-color: #fff; color: #333; font-family: 'Courier New', Courier, monospace; width: 400px; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border: 1px solid #ddd;">
        <div class="card-header text-center"
            style="background-color: rgba(138, 142, 148, 0.95); color: #000; border-bottom: none; padding: 10px;">
            <h5 class="card-title" style="font-family: 'Courier New', Courier, monospace; font-size: 24px; margin-bottom: 0;">Album Station</h5>
        </div>
        <div class="card-body" style="padding: 10px;">
            <h3 style="font-size: 16px; text-align: center; margin-bottom: 20px;">Receipt Details</h3>
            <table class="table table-bordered" style="width: 100%; font-size: 12px;">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>DSC</th>
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
            <div style="border-top: 1px dashed #000; margin-top: 10px; padding-top: 10px;">
                <h4 style="font-size: 14px;">Total Amount: ₱{{ number_format($totalAmount, 2) }}</h4>
                <h4 style="font-size: 14px;">Total Discount: ₱{{ number_format($totalDiscount, 2) }}</h4>
                <h4 style="font-size: 14px;">Payable Amount: ₱{{ number_format($payableAmount, 2) }}</h4>
                <h4 style="font-size: 14px;">Amount Paid: ₱{{ number_format($amountPaid, 2) }}</h4>
                <h4 style="font-size: 14px;">Change: ₱{{ number_format($change, 2) }}</h4>
            </div>
            <div class="text-right" style="margin-top: 10px;">
                <button type="button" onclick="window.print()"
                    class="btn btn-primary" style="font-size: 14px; padding: 5px 10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                      </svg> Receipt
                </button>
            </div>
            <br>
            <h3 style="font-size: 16px; text-align: center; margin-bottom: 20px;">Thank You for Purchasing!</h3>
        </div>
    </div>
</div>

<style>
    .table th, .table td {
        padding: 8px;
        text-align: left;
        word-wrap: break-word;
    }
    .table th, .table td:nth-child(1) { /* Product column */
        width: 15%;
    }
    .table th, .table td:nth-child(2) { /* Quantity column */
        width: 10%;
    }
    .table th, .table td:nth-child(3) { /* Price column */
        width: 15%;
    }
    .table th, .table td:nth-child(4) { /* Discount column */
        width: 15%;
    }
    .table th, .table td:nth-child(5) { /* Total column */
        width: 25%;
    }
</style>

@endsection
