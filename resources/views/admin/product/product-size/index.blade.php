@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Variants</h1>
        </div>

        <div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary my-5">
                Go Back
            </a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ $product->name }} -> Products Sizes</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product-size.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Name</label>
                                        <input type="text" name="name" id="size" class="form-control">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Products Sizes Data</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productSizes as $size)
                                    <tr>
                                        <td>
                                            {{ ++$loop->index }}
                                        </td>
                                        <td style="padding : 2rem">
                                            {{ $size->name }}
                                        </td>
                                        <td style="padding : 2rem">
                                            {{ currencyPosition($size->price) }}
                                        </td>
                                        <td>
                                            <a href=" {{ route('admin.product-size.destroy', $size->id) }}"
                                                class='btn btn-danger ml-3 delete-item'><i
                                                    class='fas fa-trash-alt'></i></a>;
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($productSizes) === 0)
                                    <tr>
                                        <td colspan="4" class="text-center">No data found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ $product->name }} -> Products Options</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product-option.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="size">Name</label>
                                        <input type="text" name="name" id="size" class="form-control">
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Products Options Data</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productOptions as $option)
                                    <tr>
                                        <td>
                                            {{ ++$loop->index }}
                                        </td>
                                        <td style="padding : 2rem">
                                            {{ $option->name }}
                                        </td>
                                        <td style="padding : 2rem">
                                            {{ currencyPosition($option->price) }}
                                        </td>
                                        <td>
                                            <a href=" {{ route('admin.product-option.destroy', $option->id) }}"
                                                class='btn btn-danger ml-3 delete-item'><i
                                                    class='fas fa-trash-alt'></i></a>;
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($productOptions) === 0)
                                    <tr>
                                        <td colspan="4" class="text-center">No data found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
