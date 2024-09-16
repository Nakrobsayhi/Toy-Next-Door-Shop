@extends('layouts.frontend')

@section('content')

<section id="yearly-sale" class="bg-light-blue padding-medium"
  style="background-image: url('https://da.lnwfile.com/_/da/_raw/0k/7j/ao.png');">
  <div class="row d-flex flex-wrap align-items-center">
    <div class="col-md-6 col-sm-12">
      <div class="text-content offset-4 padding-medium">
      </div>
    </div>
  </div>
</section>

<div class="shopify-grid padding-large">
  <div class="container">
    <div class="row">
      <main class="col-md-12">
        <div class="filter-shop d-flex justify-content-between">
          <!-- <div class="showing-product">
            <p>Showing 1–9 of  results</p>
          </div> -->
          <!-- <div class="sort-by">
            <select id="input-sort" class="form-control" data-filter-sort="" data-filter-order="">
              <option value=""><a href="shop.html?ready=yes</a></option>
                            <option value=""><a href=" shop.html?ready=yes">Default sorting</a></option>
            </select>
          </div> -->
        </div><br>

        <div class="d-flex flex-wrap" id="shop-listing">
            @foreach($products as $product)
          <div class="product-item">
          <a href="{{ asset('product/' . $product->product_id) }}">
            <img src="{{ asset('backend/product/resize/' . $product->image) }}" alt="Product Image" width="230px"
            height="auto" style="display: block; margin: 0 auto;"></a>
          <h6>{{ $product->name }}</h6>
          ฿ {{ $product->price }}
          </div>
        @endforeach
        </div>

      </main>
      <aside class="col-md-3">
        <div class="sidebar">
          <div class="widget-menu">
            <div class="widget-search-bar">

            </div>
          </div>
          <!-- <div class="widget-price-filter pt-3">
            <h5 class="widget-titlewidget-title text-decoration-underline text-uppercase">Category</h5>
            <div id="category-links">
              <a href="#" class="category-link" data-category="all">All</a><br>
              <a href="#" class="category-link" data-category="Model kit">Model kit</a><br>
              <a href="#" class="category-link" data-category="Action figure">Action figure</a><br>
              <a href="#" class="category-link" data-category="Figurine">Figurine</a><br>
              <a href="#" class="category-link" data-category="Gacha box">Gacha box</a><br>
              <a href="#" class="category-link" data-category="Tool">Tool</a><br>
            </div>
          </div> -->
        </div>
      </aside>
    </div>
  </div>
</div>

<script src="{{ asset('assets/js/shop.js') }}"></script>

@endsection
