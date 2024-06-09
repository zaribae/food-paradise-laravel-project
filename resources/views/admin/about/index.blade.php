@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>About</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Update About Us Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="image-preview">Upload Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-lable">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                            <input type="hidden" name="old_image" value="{{ @$about->image }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" class="form-control"
                            value="{{ @$about->title }}">
                    </div>
                    <div class="form-group">
                        <label>Main Title</label>
                        <input name="main_title" id="maintitle" type="text" class="form-control"
                            value="{{ @$about->main_title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="long" type="text" class="form-control summernote">{{ @$about->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="video-link">Promo Video Link</label>
                        <input name="video_link" id="video-link" type="text" class="form-control"
                            value="{{ @$about->video_link }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ @$about->image }})',
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })
    </script>
@endpush
