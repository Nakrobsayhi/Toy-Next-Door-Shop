@extends ('layouts.frontend')

@section('content')

<section class="shopify-cart padding-large">
    <div class="container">
        <div class="row">
            <div class="cart-table">

                <div class="cart-header">
                    <div class="row d-flex text-uppercase">
                        <h3 class="cart-title col-lg-4 pb-3">personal Information</h3>
                    </div>
                </div>

                @if(auth()->check())
                <form id="data-form" class="styled-form">
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your full name" value="{{ auth()->user()->name }}" style="width: 20%;">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" required placeholder="Enter your phone number" value="{{ auth()->user()->phone }}" style="width: 15%;">
                    </div>
                    <div class="form-row d-flex">
                        <div class="form-group col-md-4" style="padding-right: 10px;">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" class="form-control" required placeholder="Enter your city">
                        </div>
                        <div class="form-group col-md-4" style="padding-right: 10px;">
                            <label for="province">Province</label>
                            <input type="text" id="province" name="province" class="form-control" required placeholder="Enter your province">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control" required placeholder="Enter your postal code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="street_address">Street Address</label>
                        <input type="text" id="street_address" name="street_address" class="form-control" required placeholder="Enter your street address">
                    </div>

                    @else
                    <p>You must be logged in to place an order. Please <a href="{{ route('login') }}">log in</a> to continue.</p>
                    @endif

                    <div class="cart-header">
                        <div class="row d-flex text-uppercase">
                            <h3 class="cart-title col-lg-4 pb-3">Product</h3>
                            <h3 class="cart-title col-lg-3 pb-3">Quantity</h3>
                            <h3 class="cart-title col-lg-4 pb-3">Subtotal</h3>
                        </div>
                    </div>

                    <div class="cart-item border-top border-bottom padding-small">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-3">
                                <div class="cart-info d-flex flex-wrap align-items-center mb-4">
                                    <div class="col-lg-5">
                                        <div class="card-image">
                                            <img src="{{ asset('backend/product/' . $product->image) }}" alt="" width="90%">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card-detail">
                                            <h3 class="card-title">
                                                {{ $product->name }}
                                            </h3>
                                            <div class="card-price">
                                                <div id="product-id"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7">
                                <div class="row d-flex">
                                    <div class="col-lg-6">
                                        <div class="qty-field">
                                            <input type="number" id="amount" name="amount" class="form-control" value="1" style="width: 30%;">
                                            <div class="regular-price"></div>
                                            <div class="quantity-output text-center bg-primary"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="total-price">
                                            <h6>฿ <span id="product-price">{{ $product->price }}</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="cart-totals bg-grey padding-medium">
                <h2 class="display-7 text-uppercase text-dark pb-4">Cart Totals</h2>
                <div class="total-price pb-5">
                    <table cellspacing="0" class="table text-uppercase">
                        <tbody>
                            <tr class="order-total pt-2 pb-2 border-bottom">
                                <th>Total</th>
                                <td data-title="Total">
                                    <span id="total-price" class="price-amount amount text-primary ps-5">
                                        <bdi>฿ <span id="display-price" style="font-weight: 500; font-size: 1.2em;">{{ $product->price }}</span></bdi>
                                    </span>
                                    <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <form id="cart-form">
                <div class="button-wrap">
                    <button type="button" class="btn btn-black btn-medium text-uppercase me-2 mb-3 btn-rounded-none"
                        id="update-cart-button">place order</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>

<script src="{{ asset('assets/js/checkout.js') }}"></script>

@endsection
