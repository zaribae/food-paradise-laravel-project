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
                <form action="{{ route('admin.benefit.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <br>
                        <button class="btn btn-primary" role="iconpicker" name="icon" id="icon"></button>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="short-description">Short Description</label>
                        <textarea name="short_description" id="short-description" type="text" class="form-control"></textarea>
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
