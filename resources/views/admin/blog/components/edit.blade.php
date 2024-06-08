@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Blogs</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Edit Blogs</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.blogs.update', $blogs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="image-preview">Upload Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-lable">Choose File</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input name="title" id="name" type="text" class="form-control"
                            value="{{ @$blogs->title }}">
                    </div>
                    <div class="form-group">
                        <label for="show">Category</label>
                        <select name="category_id" class="form-control" id="show">
                            @foreach ($blogCategory as $category)
                                <option @selected($category->id === $blogs->category_id) value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="long">Description</label>
                        <textarea name="description" id="long" type="text" class="form-control summernote">{{ @$blogs->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="seo_title">Seo Title</label>
                        <input name="seo_title" id="seo_title" type="text" class="form-control"
                            value="{{ @$blogs->seo_title }}">
                    </div>
                    <div class="form-group">
                        <label for="seo_description">Seo Description</label>
                        <textarea name="seo_description" id="seo_description" type="text" class="form-control">{{ @$blogs->seo_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="select">Status</label>
                        <select name="status" class="form-control" id="select">
                            <option @selected($blogs->status === 1) value="1">Active</option>
                            <option @selected($blogs->status === 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select">Show at Home</label>
                        <select name="show_at_home" class="form-control" id="select">
                            <option @selected($blogs->show_at_home === 1) value="1">Yes</option>
                            <option @selected($blogs->show_at_home === 0) value="0">No</option>
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
                'background-image': 'url({{ $blogs->image }})',
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })
    </script>
@endpush
