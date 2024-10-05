@extends('layouts.master_backend')
@section('con')

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Make an Order</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/order/update/' . $order->orders_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter customer's name" name="name"
                                    value="{{ $order->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Phone</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter customer's phone number"
                                    name="phone" value="{{ $order->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Address</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter customer's address"
                                    name="address" value="{{ $order->address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Product</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"
                                    placeholder="Enter the product the customer has ordered (SKU)" name="product_id"
                                    value="{{ $order->product_id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Quantity</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter product ordered amount"
                                    name="amount" value="{{ $order->amount }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Status</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control mb-2" id="exampleFormControlSelect1">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <input type="submit" value="Save" class="btn btn-success">
                                <a href="{{ url('admin/order/index') }}">
                                    <button type="button" class="btn btn-danger">Discard</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-4">
            <div class="card card-user">
                <div class="image">x
                    <img src="{{ asset('backend/product/resize/no_img.png') }}" id="previewImage" alt="...">
                </div>
            </div>
        </div> -->
    </div>
</div>

@push('scripts')
    <script src="{{ asset('backend/js/custom.js') }}"></script>
@endpush

@endsection
