@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Slider</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image-preview">Upload Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-lable">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sub Title</label>
                        <input name="sub_title" id="subtitle" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="short-description">Short Description</label>
                        <input name="short_description" id="short-description" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="offer">Offer/Discount</label>
                        <input name="offer" id="offer" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="button-link">Link</label>
                        <input name="button_link" id="button-link" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select">Status</label>
                        <select name="status" class="form-control" id="select">
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
