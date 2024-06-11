@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Reservations</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>All Reservation</h4>
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
            $('body').on('change', '.reservation-status', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.reservation.update') }}",
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
