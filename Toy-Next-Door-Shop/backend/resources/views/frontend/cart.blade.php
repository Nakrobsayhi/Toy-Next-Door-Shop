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

                <form id="data-form" class="styled-form">
                    <div class="form-group full-width">
                        <label for="member_id">Member ID</label>
                        <span class="message">You need to have a membership ID to place an order. Please contact support to obtain one.</span>
                        <br>
                        <input type="text" id="member_id" name="member_id" required placeholder="Enter your member ID">
                    </div>
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your full name"
                            value="{{ auth()->check() ? auth()->user()->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" required placeholder="Enter your phone number"
                            value="{{ auth()->check() ? auth()->user()->phone : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required
                            placeholder="Enter your residential address">
                    </div>
                </form><br><br>

                <div class="cart-header" \>
                    <div class="row d-flex text-uppercase">
                        <h3 class="cart-title col-lg-4 pb-3">Product</h3>
                        <h3 class="cart-title col-lg-3 pb-3">Quantity</h3>
                        <h3 class="cart-title col-lg-4 pb-3">Subtotal</h3>
                    </div>
                </div>
                <div class="product-checkout"></div>
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
                                        <h6>1</h6>
                                        <div class="regular-price"></div>
                                        <div class="quantity-output text-center bg-primary"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="total-price">
                                        <h6>฿ {{ $product->price }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-totals bg-grey padding-medium">
                <!-- <h2 class="display-7 text-uppercase text-dark pb-4">Cart Totals</h2>
                <div class="total-price pb-5">
                    <table cellspacing="0" class="table text-uppercase">
                        <tbody>
                            <tr class="order-total pt-2 pb-2 border-bottom">
                                <th>Total</th>
                                <td data-title="Total">
                                    <span class="price-amount amount text-primary ps-5">
                                        <bdi>
                                            ฿ {{ $product->price }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
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
