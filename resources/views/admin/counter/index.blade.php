@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Counter</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Update Counter</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.counter.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="image-preview">Upload Background Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-lable">Choose File</label>
                            <input type="file" name="background" id="image-upload">
                            <input type="hidden" name="old_background" value="{{ @$counter->background }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <h6>Counter 1</h6>
                                <label for="icon">First Counter Icon</label>
                                <br>
                                <button data-icon="{{ @$counter->icon_one }}" class="btn btn-primary" role="iconpicker"
                                    name="icon_one" id="icon"></button>
                            </div>
                            <div class="form-group">
                                <label for="title">First Counter Count</label>
                                <input name="count_one" id="title" type="text" value="{{ @$counter->count_one }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">First Counter Name</label>
                                <input name="name_one" id="title" type="text" value="{{ @$counter->name_one }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <h6>Counter 2</h6>
                            <div class="form-group">
                                <label for="icon">Second Counter Icon</label>
                                <br>
                                <button data-icon="{{ @$counter->icon_two }}" class="btn btn-primary" role="iconpicker"
                                    name="icon_two" id="icon"></button>
                            </div>
                            <div class="form-group">
                                <label for="title">Second Counter Count</label>
                                <input name="count_two" id="title" type="text" value="{{ @$counter->count_two }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">Second Counter Name</label>
                                <input name="name_two" id="title" type="text" value="{{ @$counter->name_two }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <h6>Counter 3</h6>
                                <label for="icon">Third Counter Icon</label>
                                <br>
                                <button data-icon="{{ @$counter->icon_three }}" class="btn btn-primary" role="iconpicker"
                                    name="icon_three" id="icon"></button>
                            </div>
                            <div class="form-group">
                                <label for="title">Third Counter Count</label>
                                <input name="count_three" id="title" type="text" value="{{ @$counter->count_three }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">Third Counter Name</label>
                                <input name="name_three" id="title" type="text" value="{{ @$counter->name_three }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <h6>Counter 4</h6>
                            <div class="form-group">
                                <label for="icon">Fourth Counter Icon</label>
                                <br>
                                <button data-icon="{{ @$counter->icon_four }}" class="btn btn-primary" role="iconpicker"
                                    name="icon_four" id="icon"></button>
                            </div>
                            <div class="form-group">
                                <label for="title">Fourth Counter Count</label>
                                <input name="count_four" id="title" type="text" value="{{ @$counter->count_four }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">Fourth Counter Name</label>
                                <input name="name_four" id="title" type="text"
                                    value="{{ @$counter->name_four }}" class="form-control">
                            </div>
                        </div>
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
                'background-image': 'url({{ @$counter->background }})',
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })
    </script>
@endpush
