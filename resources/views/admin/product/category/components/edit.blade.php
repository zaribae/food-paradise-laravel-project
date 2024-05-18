@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Categories</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Update Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product-category.update', $productCategory->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" value="{{ $productCategory->name }}" id="name" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select">Status</label>
                        <select name="status" class="form-control" id="select">
                            <option @selected($productCategory->status === 1) value="1">Active</option>
                            <option @selected($productCategory->status === 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="show">Show at Home</label>
                        <select name="show_at_home" class="form-control" id="show">
                            <option @selected($productCategory->show_at_home === 1) value="1">Yes</option>
                            <option @selected($productCategory->show_at_home === 0) value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
