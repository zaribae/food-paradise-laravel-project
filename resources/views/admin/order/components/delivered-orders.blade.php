@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Delivered Orders</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>All Delivered Order</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                        Create New
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="order-status-form">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="asd1">Payment Status</label>
                            <select class="form-control payment-status" name="payment_status" id="asd1">
                                <option value="PENDING">Pending</option>
                                <option value="COMPLETED">Completed
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asd2">Order Status</label>
                            <select class="form-control order-status" name="order_status" id="asd2">
                                <option value="PENDING">Pending</option>
                                <option value="IN_PROCESS">In Process
                                </option>
                                <option value="DELIVERED">Delivered
                                </option>
                                <option value="DECLINED">Declined</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submit_btn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            var id = '';
            $(document).on('click', '.order-status-btn', function() {
                let orderId = $(this).data('id');;

                id = orderId;

                let paymentStatus = $('.payment-status option');
                let orderStatus = $('.order-status option');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.orders.status', ':orderId') }}".replace(':orderId',
                        orderId),
                    beforeSend: function() {
                        $('.submit_btn').prop('disabled', true);
                    },
                    success: function(response) {
                        paymentStatus.each(function() {
                            if ($(this).val() == response.payment_status
                                .toUpperCase()) {
                                $(this).attr('selected', 'selected');
                            }
                        });
                        orderStatus.each(function() {
                            if ($(this).val() == response.order_status.toUpperCase()) {
                                $(this).attr('selected', 'selected');
                            }
                        });
                        $('.submit_btn').prop('disabled', false);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                    }
                })
            })

            $('.order-status-form').on('submit', function(e) {
                e.preventDefault();
                let formContent = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.orders.status-update', ':orderId') }}".replace(':orderId',
                        id),
                    data: formContent,
                    success: function(response) {
                        $('#statusModal').modal('hide');
                        $('#inprocess-table').DataTable().draw();
                        toastr.success(response.message);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error(jqXHR.responseJSON.message);
                    }
                })
            })
        })
    </script>
@endpush
