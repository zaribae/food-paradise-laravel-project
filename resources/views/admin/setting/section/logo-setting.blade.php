<div class="tab-pane fade active show" id="logo-setting" role="tabpanel" aria-labelledby="logo-setting-tab">
    <div class="card-header">
        <h5>Logo Settings</h5>
    </div>
    <div class="card-body border">
        <form action="{{ route('admin.logo-setting.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="image-preview-1">Logo</label>
                        <div id="image-preview-1" class="image-preview logo">
                            <label for="image-lable-1">Choose File</label>
                            <input type="file" name="logo" id="image-upload-1">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="image-preview-2">Footer Logo</label>
                        <div id="image-preview-2" class="image-preview footer-logo">
                            <label for="image-lable-2">Choose File</label>
                            <input type="file" name="footer_logo" id="image-upload-2">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="image-preview-3">Site Favicon</label>
                        <div id="image-preview-3" class="image-preview favicon">
                            <label for="image-lable-3">Choose File</label>
                            <input type="file" name="favicon" id="image-upload-3">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="image-preview-4">Breadcrumb Image</label>
                        <div id="image-preview-4" class="image-preview breadcrumb">
                            <label for="image-lable-4">Choose File</label>
                            <input type="file" name="breadcrumb" id="image-upload-4">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.logo').css({
                'background-image': "url({{ asset(config('settings.logo')) }})",
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })

        $(document).ready(function() {
            $('.footer-logo').css({
                'background-image': "url({{ asset(config('settings.footer_logo')) }})",
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })

        $(document).ready(function() {
            $('.favicon').css({
                'background-image': "url({{ asset(config('settings.favicon')) }})",
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })

        $(document).ready(function() {
            $('.breadcrumb').css({
                'background-image': "url({{ asset(config('settings.breadcrumb')) }})",
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })

        $.uploadPreview({
            input_field: "#image-upload-1", // Default: .image-upload
            preview_box: "#image-preview-1", // Default: .image-preview
            label_field: "#image-lable-1", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-lable-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $.uploadPreview({
            input_field: "#image-upload-3", // Default: .image-upload
            preview_box: "#image-preview-3", // Default: .image-preview
            label_field: "#image-label-3", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $.uploadPreview({
            input_field: "#image-upload-4", // Default: .image-upload
            preview_box: "#image-preview-4", // Default: .image-preview
            label_field: "#image-label-4", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
