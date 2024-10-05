@extends('layouts.master_backend')
@section('con')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order Table</h4> -->
            <!-- <a href="{{ route('admin.order.createform') }}"><button type="submit" class="btn">Add
                            Order</button></a> -->
            <!-- {{ $order->links('pagination::bootstrap-5') }}
                </div>
            </div> -->
            <div class="card-body">
                <div class="order-container">

                    @foreach ($order as $o)

                    <div class="order-card">
                        <!-- Left Side -->
                        <div class="order-details">
                            <h3 class="order-id">Order #{{ $order->firstItem() + $loop->index }}</h3>
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

                            <div class="interact-order">
                                <a href="{{ url('admin/order/edit/' . $o->orders_id) }}">
                                    <button class="btn btn-success btn-icon btn-sm" data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="{{ url('admin/order/delete/' . $o->orders_id) }}">
                                    <button class="btn btn-danger btn-icon btn-sm" data-toggle="tooltip" title="Trash">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <!-- New Button to Trigger Image Popup -->
                                <button class="btn btn-info btn-icon btn-sm" data-toggle="modal" data-target="#imageModal" onclick="setImage('{{ asset('backend/product/' . $o->slip) }}')" title="View Image">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel">Order Slip</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img id="orderImage" src="" alt="Order Slip" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function setImage(imageSrc) {
                                    document.getElementById('orderImage').src = imageSrc;
                                }
                            </script>


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
            </div>
        </div>
    </div>
</div>

@endsection
