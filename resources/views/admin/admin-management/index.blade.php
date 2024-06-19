@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Admin Management</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>All Admin</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.admin-management.create') }}" class="btn btn-primary">
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
