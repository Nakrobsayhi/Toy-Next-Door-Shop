@extends('layouts.master_backend')
@section('con')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Category Table</h4>
                    <a href="{{ route('admin.category.createform') }}"><button type="submit" class="btn">Add
                            Category</button></a>
                    {{ $c->links('pagination::bootstrap-5') }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>#</th>
                                <th>Name</th>
                                <th>QTY</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>

                                @foreach ($c as $category)

                                    <tr>
                                        <td>{{ $c->firstItem() + $loop->index }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->pro->count() }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/category/edit/' . $category->category_id) }}">
                                                <button data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </button>
                                            </a>
                                            <a href="{{ url('admin/category/delete/' . $category->category_id) }}"><button
                                                    data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i
                                                        class="fa fa-trash-o"></i></button></a>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection