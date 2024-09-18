@extends('layouts.master_backend')
@section('con')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h4 class="card-title"> Admin Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </thead>
                            <tbody>

                                @foreach ($u as $user)

                                <tr>
                                    <td>{{ $u->firstItem() + $loop->index }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> -->

                <div class="card-header">
                    <h4 class="card-title"> User Table</h4>
                    <a href="{{ route('admin.user.createform') }}"><button type="submit" class="btn">Add
                            User</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach ($u as $member)

                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->username }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>
                                        @if ($member->IsAdmin == 1)
                                        Admin
                                        @elseif ($member->IsAdmin == 0)
                                        User
                                        @else
                                        Unknown
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/user/delete/' . $member->id) }}">
                                            <button class="btn btn-danger btn-icon btn-sm" data-toggle="tooltip" title="Trash">
                                                <i class="fa fa-times" aria-hidden="true"></i></button></a>
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
