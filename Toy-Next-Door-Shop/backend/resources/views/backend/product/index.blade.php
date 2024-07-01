@extends('layouts.master_backend')
@section('con')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Table</h4>
                    <a href="{{ route('make.pro') }}"><button type="submit" class="btn">Add
                            Product</button></a>
                    {{ $p->links('pagination::bootstrap-5') }}
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($p as $product)

                            <tr>
                                <td>{{ $p->firstItem() + $loop->index }}</td>
                                <td class="product">
                                    <img src="{{ asset('backend/product/resize/'.$product->image) }}"
                                        alt="Product Image">
                                    <div class="product-detail">
                                        <strong>{{ $product->name }}</strong>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </td>
                                <td class="product-details">{{ $product->cat->name}}</td>
                                <td class="product-details">฿{{ $product->price }}</td>
                                <td class="product-details">{{ $product->amount }}</td>
                                <td>
                                    <a href="{{ url('admin/product/edit/'.$product->product_id) }}">
                                        <button class="btn btn-success btn-icon btn-sm" data-toggle="tooltip"
                                            title="Edit">
                                            <i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                    <a href="{{ url('admin/product/delete/'.$product->product_id) }}">
                                        <button class="btn btn-danger btn-icon btn-sm" data-toggle="tooltip"
                                            title="Trash">
                                            <i class="fa fa-times" aria-hidden="true"></i></button></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <div class="mt-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection