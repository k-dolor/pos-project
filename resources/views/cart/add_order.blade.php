@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid p-0" style="margin-left: 80px; margin-right: 10px;">
    <div class="card"
        style="position: relative; margin-top: 5px; background-color: rgba(213, 217, 219, 0.5); color: #261f1f">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="background-color: rgba(138, 142, 148, 0.95); color: rgb(13, 31, 47); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Add to Cart
            </h5>
        </div>

        <div class="row p-4">
            <div class="col-md-6 d-flex align-items-center">
                <form action="{{ route('cart.add') }}" method="POST" class="w-100"
                    style="font-family: Metropolis;">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="product">Product</label>
                            <select id="product" name="product_id" class="form-control" required>
                                <option value="" disabled selected>Select a product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->product_id }}" data-price="{{ $product->price }}"
                                        data-stock="{{ $product->stock }}">{{ $product->product_name }} -
                                        {{ $product->price }}</option>
                                @endforeach
                            </select>
                            <small id="stock-info" class="form-text text-muted">Stock: 0</small>
                        </div>

                        <div class="form-group col-md-3 mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1"
                                required>
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label for="discount">Discount</label>
                            <select id="discount" name="discount" class="form-control">
                                <option value="" selected>No discount</option>
                                <option value="20">Senior & PWD Discount (20%)</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                                class="bi bi-cart-plus" viewBox="0 0 20 20">
                                <path
                                    d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z" />
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg> Add to Cart
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Product List</h2>
                    </div>
                    <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"> Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $product->product_image ? asset('storage/product/' . $product->product_image) : asset('product/album.png') }}"
                                                alt="Product Image"
                                                style="max-width: 50px; max-height: 50px; width: 100%; height: 100%; object-fit: cover;">
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>₱{{ $product->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4" style="margin-bottom: 50px; margin-right: 20px; margin-left: 20px;">
            <div class="card-header">
                <h2>Cart</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
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
                                    <td>
                                        <form
                                            action="{{ route('cart.remove', $item->cart_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <h3>Total: ₱{{ number_format($totalPrice, 2) }}</h3>
                <form method="POST" action="{{ route('checkout') }}">
                    @csrf
                    <button type="submit" class="btn btn-success mt-3">Proceed to Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('product').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const stock = selectedOption.getAttribute('data-stock');
        document.getElementById('stock-info').innerText = `Stock: ${stock}`;
    });
</script>

@endsection
