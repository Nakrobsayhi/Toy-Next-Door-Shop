@include('header')

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
      <main class="col-md-9">
        <div class="filter-shop d-flex justify-content-between">
          <div class="showing-product">
            <p>Showing 1–9 of 55 results</p>
          </div>
          <div class="sort-by">
            <select id="input-sort" class="form-control" data-filter-sort="" data-filter-order="">
              <option value=""><a href="shop.html?ready=yes">Default sorting</a></option>
              <option value=""><a href="shop.html?ready=yes">Default sorting</a></option>
            </select>
          </div>
        </div>
        <div>

          @if($products->isEmpty())
        <p>No products found.</p>
      @else
      <ul>
      @foreach($products as $product)

      <li>
      <img src="{{ asset('backend/product/resize/' . $product->image) }}" alt="Product Image">
      <h2>{{ $product->name }}</h2>
      <p>Price: ${{ $product->price }}</p>
      </li>

    @endforeach
      </ul>
      <!-- Pagination links -->
      {{ $products->links('pagination::bootstrap-5') }}
    @endif

        </div>
      </main>
      <aside class="col-md-3">
        <div class="sidebar">
          <div class="widget-menu">
            <div class="widget-search-bar">

              <form action="{{ route('shop') }}" method="GET">
                <input type="text" name="query" value="{{ request('query') }}"
                  placeholder="Search for product by brands, model..." required>
                <button type="submit">Search</button>
              </form>

            </div>
          </div>
          <div class="widget-price-filter pt-3">
            <h5 class="widget-titlewidget-title text-decoration-underline text-uppercase">Category</h5>
            <div id="category-links">
              <a href="#" class="category-link" data-category="all">All</a><br>
              <a href="#" class="category-link" data-category="Model kit">Model kit</a><br>
              <a href="#" class="category-link" data-category="Action figure">Action figure</a><br>
              <a href="#" class="category-link" data-category="Figurine">Figurine</a><br>
              <a href="#" class="category-link" data-category="Gacha box">Gacha box</a><br>
              <a href="#" class="category-link" data-category="Tool">Tool</a><br>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>

<br><br><br><br><br>

@include('footer')
