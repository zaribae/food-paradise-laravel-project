@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>All Slider</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Card Header</h4>
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
