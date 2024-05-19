@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Gallery</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>{{ $product->name }} -> Products Gallery</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary">
                        Go Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-8">
                    <form action="{{ route('admin.product-gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="galleryImage">Product Images</label>
                            <input type="file" name="product_images" id="galleryImage" class="form-control">
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-body">
                <table class="table table-striped table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productImages as $gallery)
                            <tr>
                                <td style="padding : 2rem">
                                    <img width="200rem" src="{{ asset($gallery->product_images) }}" alt="Product Images">
                                </td>
                                <td>
                                    <a href=" {{ route('admin.product-gallery.destroy', $gallery->id) }}"
                                        class='btn btn-danger ml-3 delete-item'><i class='fas fa-trash-alt'></i></a>;
                                </td>
                            </tr>
                        @endforeach
                        @if (count($productImages) === 0)
                            <tr>
                                <td colspan="2" class="text-center">No data found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
