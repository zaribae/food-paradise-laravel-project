@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daily Offer</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Daily Offer</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.daily-offer.update', $dailyOffer->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="selectS">Select Product</label>
                        <select name="product_id" class="form-control" id="product-search">
                            <option @selected($dailyOffer->product_id === $dailyOffer->product->id) value="{{ $dailyOffer->product->id }}">
                                {{ $dailyOffer->product->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectS">Status</label>
                        <select name="status" class="form-control" id="selectS">
                            <option @selected($dailyOffer->status === 1) value="1">Active</option>
                            <option @selected($dailyOffer->status === 0) value="0">Inactive</option>
                        </select>
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
            $('#product-search').select2({
                ajax: {
                    url: "{{ route('admin.daily-offer.search-product') }}",
                    data: function(params) {
                        var query = {
                            search: params.term,
                            type: 'public'
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: function(data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: $.map(data, function(product) {
                                return {
                                    text: product.name,
                                    id: product.id,
                                    thumbnail_image: product.thumbnail_image
                                }
                            })
                        };
                    },
                },
                minimumInputLength: 3,
                templateResult: formatProduct,
                escapeMarkup: function(m) {
                    return m;
                }
            });

            function formatProduct(product) {
                var product = $("<span><img src='" + product.thumbnail_image +
                    "' class='img-thumbnail' width='75'>'" + product
                    .text + "'</span>");
                return product;
            }
        })
    </script>
@endpush
