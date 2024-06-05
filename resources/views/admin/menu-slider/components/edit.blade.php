@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Menu Slider</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Edit Menu Slider</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.menu-slider.update', $menuSlider->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="image-preview">Upload Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-lable">Choose File</label>
                            <input type="file" name="banner" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" value="{{ $menuSlider->title }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Sub Title</label>
                        <input name="sub_title" id="title" type="text" value="{{ $menuSlider->sub_title }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Url</label>
                        <input name="url" id="title" type="text" value="{{ $menuSlider->url }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="selectS">Status</label>
                        <select name="status" class="form-control" id="selectS">
                            <option @selected($menuSlider->status === 1) value="1">Active</option>
                            <option @selected($menuSlider->status === 0) value="0">Inactive</option>
                        </select>
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
                'background-image': 'url({{ $menuSlider->banner }})',
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })
    </script>
@endpush
