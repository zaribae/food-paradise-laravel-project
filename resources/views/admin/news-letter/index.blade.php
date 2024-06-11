@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Subscribers</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header collapsed bg-primary text-light" role="button" data-toggle="collapse"
                            data-target="#panel-body-1" aria-expanded="true">
                            <h4>Send News Letter...</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                            <form action="{{ route('admin.news-letter.send') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="top_title">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="top_title" value="">
                                </div>
                                <div class="form-group">
                                    <label for="sub_title">Message</label>
                                    <textarea name="message" id="short-description" type="text" class="form-control summernote"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>All Subscribers</h4>
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
