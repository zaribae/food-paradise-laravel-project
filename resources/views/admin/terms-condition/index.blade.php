@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Terms & Conditions</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Update Terms & Conditions Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.terms-condition.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="description">Content Description</label>
                        <textarea name="content" id="long" type="text" class="form-control summernote">{!! @$termsCondition->content !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
