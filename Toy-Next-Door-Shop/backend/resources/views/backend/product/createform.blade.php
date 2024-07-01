@extends('layouts.master_backend')
@section('con')

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Create Product</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/product/insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter product name" name="name">
                                <div class="mt-1">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Price</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter price" name="price">
                                <div class="mt-1">
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Stock</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter stock" name="amount">
                                <div class="mt-1">
                                    @error('amount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Category</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control mb-2" id="exampleFormControlSelect1">
                                    <option selected value="">Choose Category</option>
                                    @foreach ($category as $cat)
                                    <option value="{{ $cat->category_id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('category_id')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control textarea" placeholder="Enter a description (optional)"
                                    name="description"></textarea>
                                <div class="mt-1">
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control" onchange="previewImage(this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <input type="submit" value="Save" class="btn btn-success">
                                <a href="{{ url('admin/product/index') }}">
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
                <div class="image">
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