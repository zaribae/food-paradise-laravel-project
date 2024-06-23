@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Reset Database</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-body">
                <div class="alert alert-warning">
                    <div class="alert-title">Danger</div>
                    By Clicking this button, it will wipe your entire database.
                    <form method="post" class="pt-2 reset-database">
                        <button type="submit" class="btn btn-danger mt-3 btn-submit">Reset Database</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.reset-database').on('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('admin.reset-database.destroy') }}",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            beforeSend: function() {
                                $('.btn-submit').prop('disabled', true);
                                $('.btn-submit').html(
                                    "<span class='spinner-border spinner-border-sm text-light' role='status' aria-hidden='true'></span> Deleting..."
                                );
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    toastr.success(response.message);
                                    window.location.reload();
                                } else if (response.status === 'error') {
                                    toastr.error(response.message);
                                }
                            },
                            complete: function() {
                                $('.btn-submit').html(
                                    "Reset Database"
                                );
                                $('.btn-submit').attr('disabled', false);
                            }
                        });
                    }
                });
            })

        })
    </script>
@endpush
