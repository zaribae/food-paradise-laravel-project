@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Benefit of Choosing Us</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header collapsed bg-primary text-light" role="button" data-toggle="collapse"
                            data-target="#panel-body-1" aria-expanded="true">
                            <h4>Benefit of Choosing us Titles..</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                            <div class="form-group">
                                <label for="top_title">Top Title</label>
                                <input type="text" class="form-control" name="top_title" id="top_title">
                            </div>
                            <div class="form-group">
                                <label for="main_title">Main Title</label>
                                <input type="text" class="form-control" name="main_title" id="main_title">
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" class="form-control" name="sub_title" id="sub_title">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>All Items</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
                        Create New
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
