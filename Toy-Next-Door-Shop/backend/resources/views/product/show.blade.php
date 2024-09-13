@extends ('layouts.frontend')

@section('content')

<section id="selling-product" class="single-product padding-large">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="mb-3">
                    <img src="{{ asset('backend/product/' . $product->image) }}" alt="" width="90%">
                </div>
            </div>
            <div class="col-lg-6 padding-small">
                <div class="product-info">
                    <div class="element-header">
                        {{ $product->name }}
                        <div class="">
                            {{ $product->cat->name}} | {{ $product->product_id }}
                        </div>
                    </div><br>
                    ฿ {{ $product->price }}
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Product Details</h6>
                            <br>
                            {{ $product->amount }} In stock
                            <br><br>
                        </div>
                    </div>
                </div>
                <a href="http://localhost:8000/cart/{{ $product->product_id }}">
                    <div class="qty-button d-flex flex-wrap pt-3">
                        <button id="buyNowBtn" type="button"
                            class="btn btn-primary btn-medium text-uppercase me-3 mt-3">buy
                            now</button>
                </a>
            </div>
            <!-- third paragraph -->
            <hr>
            Category: {{ $product->cat->name}}
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
                        <button class="nav-link text-uppercase pe-5" id="nav-review-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                            aria-selected="false">Reviews</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active border-top border-bottom padding-small" id="nav-home"
                        role="tabpanel" aria-labelledby="nav-home-tab">
                        {!! nl2br(e($product->description)) !!}

                    </div>
                    <div class="tab-pane fade border-top border-bottom padding-small" id="nav-review" role="tabpanel"
                        aria-labelledby="nav-review-tab">
                        <div class="review-box d-flex flex-wrap">
                            <div class="col-lg-6 d-flex flex-wrap">
                                <div class="col-md-2">
                                    <div class="image-holder">
                                        <img src="images/review-item1.jpg" alt="review" class="img-fluid">
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
                                            <span class="author-name">Tina Johnson</span>
                                            <span class="review-date">– 03/07/2023</span>
                                        </div>
                                        <p>Vitae tortor condimentum lacinia quis vel eros donec ac. Nam at lectus
                                            urna duis convallis convallis</p>
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
</section><br><br>


@endsection