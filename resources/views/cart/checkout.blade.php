@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid p-0" style="margin-left: 80px; margin-right: 10px;">
    <div class="card"
    style="position: relative; margin-top: 5px; background-color: rgba(208, 208, 208, 0.97); color: #261f1f">
    <div class="card-header d-flex justify-content-between align-items-center"
        style="background-color: rgba(138, 142, 148, 0.95s); color: rgb(13, 31, 47); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Checkout</h5>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item['product']->product_name }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>₱{{ number_format($item['product']->price, 2) }}</td>
                            <td>{{ $item['discount'] ?? 0 }}%</td>
                            <td>₱{{ number_format($item['total'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                <h3>Total Amount: <span id="total-amount">₱{{ number_format($totalAmount, 2) }}</span></h3>
            </div>
            <div class="d-flex justify-content-end">
                <h3>Discount: <span id="total-discount">₱{{ number_format($totalDiscount, 2) }}</span></h3>
            </div>
            <div class="d-flex justify-content-end">
                <h3>Payable Amount: <span id="payable-amount">₱{{ number_format($payableAmount, 2) }}</span></h3>
            </div>

            <form id="receipt-form" action="{{ route('receipt') }}" method="POST">
                @csrf
                <input type="hidden" name="cart_items" value='@json($cartItems)'>
                <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                <input type="hidden" name="total_discount" value="{{ $totalDiscount }}">
                <input type="hidden" name="payable_amount" value="{{ $payableAmount }}">
                <input type="hidden" name="amount_paid" id="amount-paid-hidden">
                <input type="hidden" name="change" id="change-hidden">
                <div class="form-group">
                    <label for="amount-paid">Amount Paid</label>
                    <input type="number" id="amount-paid" class="form-control" min="0" step="0.01" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-3" id="generate-receipt">Generate Receipt</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('generate-receipt').addEventListener('click', function () {
        const amountPaid = parseFloat(document.getElementById('amount-paid').value);
        document.getElementById('amount-paid-hidden').value = amountPaid;

        const payableAmount = parseFloat(document.querySelector('#payable-amount').innerText.replace('₱', '')
            .replace(',', ''));
        const change = amountPaid - payableAmount;
        document.getElementById('change-hidden').value = change;
    });
</script>
@endsection
