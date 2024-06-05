@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>App Download Section</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Update Section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.app-download.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-9">
                            <div class="form-group">
                                <label for="image-preview">Upload Image</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-lable">Choose File</label>
                                    <input type="file" name="image" id="image-upload">
                                    <input type="hidden" name="old_image" value="{{ $appSection->image }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-9">
                            <div class="form-group">
                                <label for="background-image-preview">Upload Background Image</label>
                                <div id="background-image-preview" class="image-preview background-image-preview">
                                    <label for="background-image-label">Choose File</label>
                                    <input type="file" name="background" id="background-image-upload">
                                    <input type="hidden" name="old_background" value="{{ $appSection->background }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" value="{{ @$appSection->title }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Short Description</label>
                        <textarea name="short_description" id="short_description" type="text" class="form-control">{{ @$appSection->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">PlayStore Link <code>(Leave empty to make it hidden)</code></label>
                        <input name="playstore_link" id="title" type="text"
                            value="{{ @$appSection->playstore_link }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">AppStore Link <code>(Leave empty to make it hidden)</code></label>
                        <input name="appstore_link" id="title" type="text" value="{{ @$appSection->appstore_link }}"
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
        $.uploadPreview({
            input_field: "#background-image-upload", // Default: .image-upload
            preview_box: "#background-image-preview", // Default: .image-preview
            label_field: "#background-image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ @$appSection->image }})',
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })

        $(document).ready(function() {
            $('.background-image-preview').css({
                'background-image': 'url({{ @$appSection->background }})',
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })
    </script>
@endpush
