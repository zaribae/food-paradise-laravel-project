<div class="tab-pane fade" id="v-pills-reservation" role="tabpanel" aria-labelledby="v-pills-reservation-tab">
    <div class="fp_dashboard_body">
        <h3>Reservation</h3>
        <div class="fp_dashboard_order">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr class="t_header">
                            <th>No</th>
                            <th>Reservation Id</th>
                            <th>Date/Time</th>
                            <th>Person</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>
                                    <h5>{{ ++$loop->index }}</h5>
                                </td>
                                <td>
                                    {{ $reservation->reservation_id }}
                                </td>
                                <td>
                                    {{ $reservation->date }} | {{ $reservation->time }}
                                </td>
                                <td>
                                    {{ $reservation->persons }}
                                </td>
                                <td>
                                    @if (strtoupper($reservation->status) === 'PENDING')
                                        <span class="active">Pending</span>
                                    @elseif (strtoupper($reservation->status) === 'APPROVED')
                                        <span class="active">Approved</span>
                                    @elseif (strtoupper($reservation->status) === 'COMPLETED')
                                        <span class="complete">Completed</span>
                                    @elseif (strtoupper($reservation->status) === 'CANCELED')
                                        <span class="cancel">Canceled</span>
                                    @endif
                                </td>
                                {{-- <td><a class="view_invoice" onclick="viewInvoice('{{ $order->id }}')">View
                                        Details</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @foreach ($orders as $order)
            <div class="fp__invoice invoice_details_{{ $order->id }}">
                <a class="go_back d-print-none"><i class="fas fa-long-arrow-alt-left"></i> go back</a>
                <div class="fp__track_order">
                    <ul>

                        @if (strtoupper($order->order_status) === 'DECLINED')
                            <li
                                class="declined_status {{ in_array(strtoupper($order->order_status), ['DECLINED']) ? 'active' : '' }}">
                                order
                                declined</li>
                        @else
                            <li
                                class="{{ in_array(strtoupper($order->order_status), ['PENDING', 'IN_PROCESS', 'DELIVERED', 'DECLINED']) ? 'active' : '' }}">
                                order pending
                            </li>
                            <li
                                class="{{ in_array(strtoupper($order->order_status), ['IN_PROCESS', 'DELIVERED', 'DECLINED']) ? 'active' : '' }}">
                                order in
                                process</li>
                            <li class="{{ in_array(strtoupper($order->order_status), ['DELIVERED']) ? 'active' : '' }}">
                                order
                                delivered</li>
                        @endif
                        {{-- <li>order declined</li> --}}
                    </ul>
                </div>
                <div class="fp__invoice_header">
                    <div class="header_address">
                        <h4>invoice to</h4>
                        <p>{{ $order->address }}</p>
                        <p>{{ @$order->userAddress->phone_number }}</p>
                        <p>{{ @$order->userAddress->email }}</p>
                    </div>
                    <div class="header_address" style="width: 50%">
                        <p><b style="width: 9rem">invoice no: </b><span>{{ @$order->invoice_id }}</span></p>
                        <p><b style="width: 9rem">Payment Status:</b> <span> {{ @$order->payment_status }}</span></p>
                        <p><b style="width: 9rem">Payment Method:</b> <span> {{ @$order->payment_method }}</span></p>
                        <p><b style="width: 9rem">Transaction ID:</b> <span> {{ @$order->transaction_id }}</span></p>
                        <p><b style="width: 9rem">date:</b>
                            <span>{{ date('d-m-Y', strtotime($order->created_at)) }}</span>
                        </p>
                    </div>
                </div>
                <div class="fp__invoice_body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr class="border_none">
                                    <th class="sl_no">SL</th>
                                    <th class="package">item description</th>
                                    <th class="price">Price</th>
                                    <th class="qnty">Quantity</th>
                                    <th class="total">Total</th>
                                </tr>

                                @foreach ($order->orderItems as $item)
                                    @php
                                        $size = json_decode($item->product_size);
                                        $options = json_decode($item->product_option);

                                        $qty = $item->qty;
                                        $productPrice = $item->product_price;
                                        $sizePrice = $size->price ?? 0;
                                        $optionPrice = 0;

                                        foreach (@$options as $optionItem) {
                                            $optionPrice += $optionItem->price;
                                        }

                                        $productTotalPrice = ($productPrice + $sizePrice + $optionPrice) * $qty;
                                    @endphp
                                    <tr>
                                        <td class="sl_no">{{ ++$loop->index }}</td>
                                        <td class="package">
                                            <p>{{ $item->product_name }}</p>
                                            @if (@$size != null)
                                                <span class="size">{{ @$size->name }} -
                                                    {{ @$size->price ? currencyPosition(@$size->price) : '' }}</span>
                                                @if (@$options != null)
                                                    @foreach (@$options as $option)
                                                        <span class="coca_cola">{{ @$option->name }} -
                                                            {{ @$option->price ? currencyPosition(@$option->price) : '' }}</span>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </td>
                                        <td class="price">
                                            <b>{{ currencyPosition($item->product_price) }}</b>
                                        </td>
                                        <td class="qnty">
                                            <b>{{ $item->qty }}</b>
                                        </td>
                                        <td class="total">
                                            <b>{{ currencyPosition(@$productTotalPrice) }}</b>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="package" colspan="3">
                                        <b>sub total</b>
                                    </td>
                                    <td class="qnty">
                                        <b>-</b>
                                    </td>
                                    <td class="total">
                                        <b>{{ currencyPosition($order->subtotal) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="package coupon" colspan="3">
                                        <b>(-) Discount coupon</b>
                                    </td>
                                    <td class="qnty">
                                        <b></b>
                                    </td>
                                    <td class="total coupon">
                                        <b>{{ currencyPosition($order->discount) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="package coast" colspan="3">
                                        <b>(+) Shipping Cost</b>
                                    </td>
                                    <td class="qnty">
                                        <b></b>
                                    </td>
                                    <td class="total coast">
                                        <b>{{ currencyPosition($order->delivery_cost) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="package" colspan="3">
                                        <b>Total Paid</b>
                                    </td>
                                    <td class="qnty">
                                        <b></b>
                                    </td>
                                    <td class="total">
                                        <b>{{ currencyPosition($order->grand_total) }}</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <a class="print_btn common_btn" href="javascript:;" onclick="printInvoice('{{ $order->id }}')"><i
                        class="far fa-print d-print-none"></i>
                    print
                    PDF</a>

            </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

        })

        function viewInvoice(id) {
            $(".fp_dashboard_order").fadeOut();
            $(".invoice_details_" + id).fadeIn();
        }

        function printInvoice(id) {
            let printContents = $('.invoice_details_' + id).html();

            let printWindow = window.open('', '', 'width=600, height=600');
            printWindow.document.open();
            printWindow.document.write('<html>');
            printWindow.document.write('<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">');

            printWindow.document.write('<body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            printWindow.print();
            printWindow.close();
        }
    </script>
@endpush
