@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Blog Categories</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Blog Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blog-category.update', $blogCategory->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" id="name" type="text" value="{{ $blogCategory->name }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select">Status</label>
                        <select name="status" class="form-control" id="select">
                            <option @selected($blogCategory->status === 1) selected value="1">Active</option>
                            <option @selected($blogCategory->status === 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="show">Show at Home</label>
                        <select name="show_at_home" class="form-control" id="show">
                            <option @selected($blogCategory->show_at_home === 1) value="1">Yes</option>
                            <option @selected($blogCategory->show_at_home === 0) selected value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
