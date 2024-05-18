@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image-preview">Upload Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-lable">Choose File</label>
                            <input type="file" name="thumbnail_image" id="image-upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" id="name" type="text" class="form-control"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="show">Category</label>
                        <select name="product_category_id" class="form-control" id="show">
                            <option selected>Select Category</option>
                            @foreach ($productCategory as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="short">Short Description</label>
                        <textarea name="short_description" id="short" type="text" class="form-control"
                            value="{{ old('short_description') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="long">Long Description</label>
                        <textarea name="long_description" id="long" type="text" class="form-control summernote">{{ old('long_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" id="price" type="text" class="form-control"
                            value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label for="offer-price">Offer Price</label>
                        <input name="offer_price" id="offer-price" type="text" class="form-control"
                            value="{{ old('offer_price') }}">
                    </div>
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input name="sku" id="sku" type="text" class="form-control"
                            value="{{ old('sku') }}">
                    </div>
                    <div class="form-group">
                        <label for="seo_title">Seo Title</label>
                        <input name="seo_title" id="seo_title" type="text" class="form-control"
                            value="{{ old('seo_title') }}">
                    </div>
                    <div class="form-group">
                        <label for="seo_description">Seo Description</label>
                        <textarea name="seo_description" id="seo_description" type="text" class="form-control">{{ old('seo_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="select">Status</label>
                        <select name="status" class="form-control" id="select">
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="show">Show at Home</label>
                        <select name="show_at_home" class="form-control" id="show">
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
