@extends ('layouts.frontend')

@section('content')

<br><br><br>

<section class="shopify-cart padding-large">
    <div class="container">
        <div class="row">
            <!-- Left Column: Address Details -->
            <div class="col-lg-6">
                <div class="cart-header">
                    <h3 class="cart-title pb-3">Personal Information</h3>
                </div>

                @if(auth()->check())

                <form action="{{ url('admin/order/insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <div class="accordion" id="addressAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingAddress">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAddress" aria-expanded="true" aria-controls="collapseAddress">
                                    Address Details
                                </button>
                            </h2>
                            <div id="collapseAddress" class="accordion-collapse collapse show" aria-labelledby="headingAddress" data-bs-parent="#addressAccordion">
                                <div class="accordion-body">
                                    <div class="form-group">
                                        <label for="street_address">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your street address" value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="street_address">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" required placeholder="Enter your street address" value="{{ auth()->user()->phone }}">
                                    </div>
                                    <div class="form-row d-flex">
                                        <div class="form-group " style="padding-right: 10px;">
                                            <label for="city">City</label>
                                            <input type="text" id="city" name="city" class="form-control" required placeholder="Enter your city">
                                        </div>
                                        <div class="form-group " style="padding-right: 10px;">
                                            <label for="province">Province</label>
                                            <input type="text" id="province" name="province" class="form-control" required placeholder="Enter your province">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code">Postal Code</label>
                                        <input type="text" id="postal_code" name="postal_code" class="form-control" required placeholder="Enter your postal code">
                                    </div>
                                    <div class="form-group">
                                        <label for="street_address">Street Address</label>
                                        <input type="text" id="street_address" name="street_address" class="form-control" required placeholder="Enter your street address">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Dropdown -->
                    <div class="accordion" id="paymentAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPayment">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
                                    Payment Method
                                </button>
                            </h2>
                            <div id="collapsePayment" class="accordion-collapse collapse" aria-labelledby="headingPayment" data-bs-parent="#paymentAccordion">
                                <div class="accordion-body">
                                    <div class="form-group">
                                        <label for="payment_method">Select Payment Method</label>
                                        <select id="payment_method" class="form-control" required>
                                            <option value="bank_transfer">Bank Transfer</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-accent" style="margin-top: 10px;" id="showQrButton" type="button">Show QR Code</button>

                                    <div class="form-group mt-3">
                                        <label for="payment_slip">Upload Payment Slip</label>
                                        <input type="file" id="payment_slip" name="slip" class="form-control" required>
                                    </div>

                                    <!-- QR Code Modal -->
                                    <div class="modal fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="qrCodeModalLabel">Bank Transfer QR Code</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('/assets/images/qr.jpg')}}" alt="QR Code" style="width: 100%; height: auto;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else
                    <p>You must be logged in to place an order. Please <a href="{{ route('login') }}">log in</a> to continue.</p>
                    @endif

            </div>

            <!-- Middle Line Separator -->
            <div class="col-lg-1">
                <div class="line-separator"></div>
            </div>

            <!-- Right Column: Product Details -->
            <div class="col-lg-5">
                <div class="cart-header">
                    <h3 class="cart-title pb-3">Your Cart</h3>
                </div>

                <div class="cart-item border-top border-bottom padding-small">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-5">
                            <div class="cart-info d-flex align-items-center">
                                <div class="card-image">
                                    <img src="{{ asset('backend/product/' . $product->image) }}" alt="" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="card-detail">
                                <h4>{{ $product->name }}</h4>
                                <div class="qty-field">
                                    <label>Quantity</label>
                                    <input type="number" id="amount" name="amount" class="form-control" value="1">
                                </div>
                                <div class="total-price">
                                    <h6>฿ <span id="product-price">{{ $product->price }}</span></h6>
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
                <input type="submit" value="Place Order" class="btn btn-dark">
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('assets/js/checkout.js') }}"></script>

@endsection
