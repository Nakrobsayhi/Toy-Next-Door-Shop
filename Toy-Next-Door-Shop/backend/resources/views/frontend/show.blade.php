@extends ('layouts.frontend')

@section('content')

<section id="selling-product" class="single-product padding-large">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-box p-5"
                    style="width: 1300px; height: auto;">

                    <nav class="breadcrumb">
                        <a href="/">Home</a>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <a href="/shop">Shop</a>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <a href="/shop">{{ $product->cat->name}}</a>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span>{{ $product->name }}</span>
                    </nav><br>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <img src="{{ asset('backend/product/' . $product->image) }}" alt="" width="90%">
                            </div>
                        </div>
                        <div class="col-lg-6 padding-small">
                            <div class="product-info">
                                <div class="element-header" style="font-size: 1.5em; font-weight: 500;">
                                    {{ $product->name }}
                                    <div style="font-size: 16px; font-weight: normal; color: grey;">
                                        {{ $product->cat->name}} | {{ $product->product_id }}
                                    </div>
                                </div><br>
                                <span style="font-size: 1.6em; font-weight: 500;">฿ {{ $product->price }}</span>
                                <div class="row">
                                    <div class="col-md-8">
                                        <br>
                                        <h6 style="font-size: 16px; font-weight: normal; color: grey;">Product Details</h6><br>
                                        <span style="font-size: 16px; font-weight: normal; color: grey;">{{ $product->amount }} In stock</span><br>
                                        <span style="font-size: 16px; font-weight: normal; color: grey;">Category </span><span
                                            style="padding: 100px; font-size: 1.2em; font-weight: 500; color:rgb(90 90 90/var(--tw-text-opacity));">{{ $product->cat->name}}</span><br>
                                        <span style="font-size: 16px; font-weight: normal; color: grey;">SKU </span><span
                                            style="padding: 135px; font-size: 1.2em; font-weight: 500; color:rgb(90 90 90/var(--tw-text-opacity));">{{ $product->product_id}}</span><br>
                                        <span style="font-size: 16px; font-weight: normal; color: grey;">Ready for ship </span><span
                                            style="padding: 60px; font-size: 1.2em; font-weight: 500; color:rgb(90 90 90/var(--tw-text-opacity));">{{ $product->ready}}</span>
                                        <br><br>
                                    </div>
                                </div>
                            </div>

                            <div class="qty-button d-flex flex-wrap pt-3">
                                <button id="buyNowBtn" type="button"
                                    class="btn btn-dark btn-medium text-uppercase me-3 mt-3"
                                    style="font-size: 16px;">Buy Now</button>
                                <br>
                                <p id="loginWarning" class="text-danger mt-2" style="display: none;">
                                    You need to <a href="{{ route('login') }}">log in</a> to place an order.
                                </p>
                            </div>

                            <script>
                                document.getElementById('buyNowBtn').addEventListener('click', function() {
                                    // Check if the user is logged in using a backend variable
                                    @if(Auth::check())
                                    // If logged in, redirect to cart
                                    window.location.href = "{{ url('/cart/' . $product->product_id) }}";
                                    @else
                                    // If not logged in, show the warning message
                                    document.getElementById('loginWarning').style.display = 'block';
                                    @endif
                                });
                            </script>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-info-tabs">
    <div class="container">
        <div class="row">
            <div class="tabs-listing">
                <nav>
                    <div class="nav nav-tabs d-flex flex-wrap justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active text-uppercase pe-5" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">Description</button>
                        <!-- <button class="nav-link text-uppercase pe-5" id="nav-review-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                            aria-selected="false">Reviews</button> -->
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active border-top border-bottom padding-small" id="nav-home"
                        role="tabpanel" aria-labelledby="nav-home-tab" style="font-size: 1.1em; font-weight: 500; color:rgb(90 90 90/var(--tw-text-opacity));">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                    <div class="tab-pane fade border-top border-bottom padding-small" id="nav-review" role="tabpanel"
                        aria-labelledby="nav-review-tab">
                        <div class="review-box d-flex flex-wrap">
                            <div class="col-lg-6 d-flex flex-wrap">
                                <div class="col-md-2">
                                    <div class="image-holder">
                                        <img src="https://down-th.img.susercontent.com/file/th-11134103-7r98y-m018z55c09t59e.webp"
                                            alt="review" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="review-content">
                                        <div class="rating-container d-flex align-items-center">
                                            <div class="rating" data-rating="1" onclick="rate(1)">
                                                <i class="icon icon-star"></i>
                                            </div>
                                            <div class="rating" data-rating="2" onclick="rate(1)">
                                                <i class="icon icon-star"></i>
                                            </div>
                                            <div class="rating" data-rating="3" onclick="rate(1)">
                                                <i class="icon icon-star"></i>
                                            </div>
                                            <div class="rating" data-rating="4" onclick="rate(1)">
                                                <i class="icon icon-star-half"></i>
                                            </div>
                                            <div class="rating" data-rating="5" onclick="rate(1)">
                                                <i class="icon icon-star-empty"></i>
                                            </div>
                                            <span class="rating-count">(5)</span>
                                        </div>
                                        <div class="review-header">
                                            <span class="author-name">kenshiro1122</span>
                                            <span class="review-date">– 03/07/2023</span>
                                        </div>
                                        <p>แพ็คมาดี จัดส่งไว ครั้งหน้าจะมาอุดหนุนใหมนะครับ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex flex-wrap">
                                <div class="col-md-2">
                                    <div class="image-holder">
                                        <img src="images/review-item2.jpg" alt="review" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="review-content">
                                        <div class="rating-container d-flex align-items-center">
                                            <div class="rating" data-rating="1" onclick="rate(1)">
                                                <i class="icon icon-star"></i>
                                            </div>
                                            <div class="rating" data-rating="2" onclick="rate(1)">
                                                <i class="icon icon-star"></i>
                                            </div>
                                            <div class="rating" data-rating="3" onclick="rate(1)">
                                                <i class="icon icon-star"></i>
                                            </div>
                                            <div class="rating" data-rating="4" onclick="rate(1)">
                                                <i class="icon icon-star-half"></i>
                                            </div>
                                            <div class="rating" data-rating="5" onclick="rate(1)">
                                                <i class="icon icon-star-empty"></i>
                                            </div>
                                            <span class="rating-count">(3.5)</span>
                                        </div>
                                        <div class="review-header">
                                            <span class="author-name">Jenny Willis</span>
                                            <span class="review-date">– 03/06/2022</span>
                                        </div>
                                        <p>Vitae tortor condimentum lacinia quis vel eros donec ac. Nam at lectus
                                            urna duis convallis convallis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br><br><br>

@endsection
