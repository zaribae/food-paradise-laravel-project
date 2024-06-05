@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Chefs</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Chef Data</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.chef.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image-preview">Upload Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-lable">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Chef Name</label>
                        <input name="name" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Chef Title</label>
                        <input name="title" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Facebook Profile Link <code>(Leave empty to make it hidden)</code></label>
                        <input name="fb" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">LinkedIn Profile Link <code>(Leave empty to make it hidden)</code></label>
                        <input name="in" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Twitter Profile Link <code>(Leave empty to make it hidden)</code></label>
                        <input name="x" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Instagram Profile Link <code>(Leave empty to make it hidden)</code></label>
                        <input name="ig" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="selectS">Status</label>
                        <select name="status" class="form-control" id="selectS">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectS">Show at Home</label>
                        <select name="show_at_home" class="form-control" id="selectS">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
