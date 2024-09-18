@extends('layouts.frontend')

@section('content')

<section id="yearly-sale" class="bg-light-blue padding-xlarge"
  style="background-image: url('assets/images/banner-image.jpg');">
  <div class="row d-flex flex-wrap align-items-center">
    <div class="col-md-6 col-sm-12">
      <div class="text-content offset-4 padding-mega">
      </div>
    </div>
  </div>
</section>

<section id="company-services" class="padding-large bg-gradient">
  <div class="container">
    <div class="row text-center">
      <!-- Free Delivery -->
      <div class="col-lg-3 col-md-6 pb-4">
        <div class="icon-box d-flex flex-column align-items-center hover-shadow">
          <div class="icon-box-icon mb-3">
            <svg class="icon" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#cart-outline" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-dark mb-2">Free Delivery</h3>
            <p class="text-muted">Enjoy complimentary delivery on all orders, straight to your doorstep. No extra charges!</p>
          </div>
        </div>
      </div>
      <!-- Quality Guarantee -->
      <div class="col-lg-3 col-md-6 pb-4">
        <div class="icon-box d-flex flex-column align-items-center hover-shadow">
          <div class="icon-box-icon mb-3">
            <svg class="icon" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#quality" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-dark mb-2">Quality Guarantee</h3>
            <p class="text-muted">Shop with confidence. Our products meet the highest standards of quality and excellence.</p>
          </div>
        </div>
      </div>
      <!-- Daily Offers -->
      <div class="col-lg-3 col-md-6 pb-4">
        <div class="icon-box d-flex flex-column align-items-center hover-shadow">
          <div class="icon-box-icon mb-3">
            <svg class="icon" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#price-tag" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-dark mb-2">Daily Offers</h3>
            <p class="text-muted">Unlock exclusive deals and discounts every day. Save more on the best products!</p>
          </div>
        </div>
      </div>
      <!-- 100% Secure Payment -->
      <div class="col-lg-3 col-md-6 pb-4">
        <div class="icon-box d-flex flex-column align-items-center hover-shadow">
          <div class="icon-box-icon mb-3">
            <svg class="icon" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <use xlink:href="#shield-plus" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-dark mb-2">100% Secure Payment</h3>
            <p class="text-muted">Your payment information is protected with our state-of-the-art security systems. Shop safely!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
  <div class="container">
    <a href="{{ route('shop', ['category' => '1']) }}">
      <p>Model kit &#129122;</p>
    </a><br>
    <div id="product-list">
    </div>
  </div>
</section>

<section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
  <div class="container">
    <a href="{{ route('shop', ['category' => '2']) }}">
      <p>Figurine &#129122;</p>
    </a><br>
    <div id="product-list2">
    </div>
  </div>
</section>

<section id="testimonials" class="position-relative">
  <div class="container">
    <div class="row">
      <div class="review-content position-relative">
        <div class="swiper-icon swiper-arrow swiper-arrow-prev position-absolute d-flex align-items-center">
          <svg class="chevron-left">
            <use xlink:href="#chevron-left" />
          </svg>
        </div>
        <div class="swiper testimonial-swiper">
          <div class="quotation text-center">
            <svg class="quote">
              <use xlink:href="#quote" />
            </svg>
          </div>
          <div class="swiper-wrapper">
            <div class="swiper-slide text-center d-flex justify-content-center">
              <div class="review-item col-md-10">
                <i class="icon icon-review"></i>
                <blockquote style="font-size: 26px;">"กล่องสวยงาม มุมคม ห่อกันกระแทรกได้ดี เหมาะแก่การเก็บกล่องโชว์
                  บรรจุหน้าแน่น แถมส่งไว
                  แต่ของดองไว้ก่อน ของเก่ายังไม่ได้ต่ออีกเยอะ 😁😁"
                </blockquote>
                <div class="rating">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-half">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-empty">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                </div>
                <div class="author-detail">
                  <div class="name text-dark text-uppercase pt-2">tityparty</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide text-center d-flex justify-content-center">
              <div class="review-item col-md-10">
                <i class="icon icon-review"></i>
                <blockquote style="font-size: 26px;">“ชอบค่า ส่งไวมากๆ คุยถามตอบได้ตลอด ส่งมาเรียบร้อยดีไม่มีปัญหาทั้งกับตัวกล่องและโมเดล ราคาถูกกว่าร้านอื่นมากๆ ถึงจะเป็นพรีออเดอร์เหมือนกัน เพราะมีโค้ดส่วนลดฝนชอปปี้"
                </blockquote>
                <div class="rating">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-half">
                    <use xlink:href="#star-half"></use>
                  </svg>
                  <svg class="star star-empty">
                    <use xlink:href="#star-empty"></use>
                  </svg>
                </div>
                <div class="author-detail">
                  <div class="name text-dark text-uppercase pt-2">savepatthawee</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-icon swiper-arrow swiper-arrow-next position-absolute d-flex align-items-center">
          <svg class="chevron-right">
            <use xlink:href="#chevron-right" />
          </svg>
        </div>
      </div>
    </div>
  </div>
  <div class="swiper-pagination"></div>
</section><br><br><br><br><br>


<section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
  <div class="container">
    <a href="{{ route('shop', ['category' => '3']) }}">
      <p>Action figure &#129122;</p>
    </a><br>
    <div id="product-list3">
    </div>
  </div>
</section>

<section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
  <div class="container">
    <a href="{{ route('shop', ['category' => '4']) }}">
      <p>Tool &#129122;</p>
    </a><br>
    <div id="product-list4">
    </div>
  </div>
</section>

<br><br>

<script src="{{ asset('assets/js/app.js') }}"></script>

@endsection
