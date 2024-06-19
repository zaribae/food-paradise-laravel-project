@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Admin Management</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Edit Admin</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.admin-management.update', $admin->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input name="name" id="title" type="text" class="form-control"
                            value="{{ $admin->name }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" id="subtitle" type="email" class="form-control"
                            value="{{ $admin->email }}">
                    </div>
                    <div class="form-group">
                        <label for="offer">Password</label>
                        <input name="password" id="offer" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="offer">Password Confirmation</label>
                        <input name="password_confirmation" id="offer" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select">Role</label>
                        <select name="role" class="form-control" id="select">
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
