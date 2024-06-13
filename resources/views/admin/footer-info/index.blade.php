@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Footer Info</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Edit Footer Info</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-info.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Short Description</label>
                        <input name="short_description" id="title" type="text" class="form-control"
                            value="{{ @$footerInfo->short_description }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Address</label>
                        <input name="address" id="title" type="text" class="form-control"
                            value="{{ @$footerInfo->address }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Phone</label>
                        <input name="phone" id="title" type="text" class="form-control"
                            value="{{ @$footerInfo->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input name="email" id="title" type="email" class="form-control"
                            value="{{ @$footerInfo->email }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Copyrights</label>
                        <input name="copyright" id="title" type="text" class="form-control"
                            value="{{ @$footerInfo->copyright }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
