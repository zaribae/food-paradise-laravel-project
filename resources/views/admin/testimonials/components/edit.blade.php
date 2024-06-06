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
                <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST"
                    enctype="multipart/form-data">
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
                        <label for="title">Name</label>
                        <input name="name" id="title" type="text" value="{{ @$testimonial->name }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Area Address</label>
                        <input name="area" id="title" type="text" value="{{ @$testimonial->area }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Review/Feedback</label>
                        <textarea name="review" id="title" type="text" class="form-control">{{ @$testimonial->review }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="selectS">Rating</label>
                        <select name="rating" class="form-control" id="selectS">
                            <option @selected(@$testimonial->rating === 1) value="1">1</option>
                            <option @selected(@$testimonial->rating === 2) value="2">2</option>
                            <option @selected(@$testimonial->rating === 3) value="3">3</option>
                            <option @selected(@$testimonial->rating === 4) value="4">4</option>
                            <option @selected(@$testimonial->rating === 5) value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectS">Status</label>
                        <select name="status" class="form-control" id="selectS">
                            <option @selected(@$testimonial->status === 1) value="1">Active</option>
                            <option @selected(@$testimonial->status === 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectS">Show at Home</label>
                        <select name="show_at_home" class="form-control" id="selectS">
                            <option @selected(@$testimonial->show_at_home === 1) value="1">Yes</option>
                            <option @selected(@$testimonial->show_at_home === 0) value="0">No</option>1) value="0">No</option>
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
                'background-image': 'url({{ $testimonial->image }})',
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })
    </script>
@endpush
