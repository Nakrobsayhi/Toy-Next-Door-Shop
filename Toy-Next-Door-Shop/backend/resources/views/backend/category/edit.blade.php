@extends('layouts.master_backend')
@section('con')

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/update/'.$cat->category_id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Please enter a new category name" value="{{ $cat->name }}">
                                </div>

                            </div>
                        </div>
                        <div>
                            <input type="submit" value="Save" class="btn btn-primary btn-round">
                            <a href="{{ url('admin/category/index') }}">
                                <button type="button" class="btn btn-primary btn-round">Discard</button>
                            </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection