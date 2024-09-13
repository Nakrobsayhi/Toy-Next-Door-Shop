@extends('layouts.master_backend')
@section('con')

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Add Member</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/user/insert') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Member ID</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter member ID"
                                    name="member_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Full Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter member's full name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Phone</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter member's phone number" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">E-mail</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter member's e-mail" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <input type="submit" value="Save" class="btn btn-success">
                                <a href="{{ url('admin/user/index') }}">
                                    <button type="button" class="btn btn-danger">Discard</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection