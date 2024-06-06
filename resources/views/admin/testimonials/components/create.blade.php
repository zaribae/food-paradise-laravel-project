@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Testimonial</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Testimonials</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image-preview">Upload Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-lable">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input name="name" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Area Address</label>
                        <input name="area" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Review/Feedback</label>
                        <textarea name="review" id="title" type="text" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="selectS">Rating</label>
                        <select name="rating" class="form-control" id="selectS">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
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
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
