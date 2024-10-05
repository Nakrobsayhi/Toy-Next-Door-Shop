@extends ('layouts.frontend')

@section('content')

<br><br><br><br>

<style>
    .order-container {
        display: flex;
        flex-wrap: wrap;
        /* Allow wrapping to the next row */
        justify-content: space-between;
        /* Space between cards */
        gap: 20px;
        /* Space between the cards */
    }

    .order-card {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 20px;
        width: calc(50% - 20px);
        /* Two cards per row */
        box-sizing: border-box;
        display: flex;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        flex: 1 1 calc(50% - 20px);
        /* Flex basis for two per row */
    }

    .order-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .order-details {
        width: 66.67%;
        padding-right: 20px;
    }

    .product-image img {
        max-height: 250px;

    }

    .order-id {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .order-card p {
        margin: 10px 0;
        font-size: 14px;
    }

    .order-card p strong {
        color: #666;
    }

    .status {
        font-weight: bold;
        margin-top: 15px;
    }

    .status.pending {
        color: #FFA726;
    }

    .status.completed {
        color: #4CAF50;
    }

    .status.cancelled {
        color: #F44336;
    }

    .statuscheck {
        width: 130px;
        background-color: #FFFFFF;
        border: 1px solid #DDDDDD;
        border-radius: 4px;
        color: #66615b;
        line-height: normal;
        font-size: 14px;
        transition: color 0.3s ease-in-out, border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;
        box-shadow: none;
    }

    .interact-order {
        display: flex;
        gap: 5px;
    }

    p {
        color: black;
        font-size: 1.2em;
        font-weight: normal;
    }
</style>

<section class="shopify-cart padding-large">
    <div class="container">
        <div class="row">
            <div class="cart-table">
                <div class="cart-header">
                    <div class="row d-flex">
                        <h3 class="cart-title col-lg-4 pb-3">My Orders</h3>
                    </div>
                </div>

                @php
                $userOrders = $order->filter(function ($o) {
                return $o->name === auth()->user()->name;
                });
                @endphp

                @if ($userOrders->isNotEmpty())
                <div class="order-container"> <!-- Wrapper for order cards -->
                    @foreach ($userOrders as $index => $o)
                    <div class="order-card">
                        <!-- Left Side -->
                        <div class="order-details">
                            <h3 class="order-id">Order #{{ $index + 1 }}</h3> <!-- Display order number based on loop index -->
                            <p><strong>Name:</strong> {{ $o->name }}</p>
                            <p><strong>Phone:</strong> {{ $o->phone }}</p>
                            <p><strong>Address:</strong> {{ $o->address }}</p>
                            <p><strong>Product:</strong>
                                @if($o->pro)
                                {{ $o->pro->name }} <strong>×{{ $o->amount }}</strong>
                                @else
                                Product Not Available
                                @endif
                            </p>
                            <p><strong>Price:</strong> ฿ {{ number_format($o->price, 2) }}</p>
                            <p class="status {{ ($o->status) }}"><strong>Status:</strong> {{ $o->status }}</p>
                        </div>
                        <!-- Right Side -->
                        <div class="product-image">
                            @if($o->pro && $o->pro->image)
                            <img src="{{ asset('backend/product/' . $o->pro->image) }}" alt="{{ $o->pro->name }}">
                            @else
                            Image Not Available
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>No orders found for you.</p>
                @endif

            </div>
        </div>
    </div>
</section><br><br>

@endsection
