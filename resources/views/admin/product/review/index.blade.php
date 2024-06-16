@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Reviews</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>All Product Reviews</h4>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('change', '.review-status', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.product-review.update') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                    },
                })
            })
        })
    </script>
@endpush
