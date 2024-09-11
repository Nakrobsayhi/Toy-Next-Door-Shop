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
                    <form action="{{ url('admin/order/insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter customer's name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Phone</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter customer's phone number"
                                    name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Address</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter customer's address"
                                    name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Product</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"
                                    placeholder="Enter the product the customer has ordered (SKU)" name="product_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Amount</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter product ordered amount"
                                    name="amount">
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

        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">x
                    <img src="{{ asset('backend/product/resize/no_img.png') }}" id="previewImage" alt="...">
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('backend/js/custom.js') }}"></script>
@endpush

@endsection