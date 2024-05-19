@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Gallery</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>{{ $product->name }} Products Images Gallery</h4>
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
                                <td>
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
                {{-- <div class="card">
                    <div class="card-header">
                        <h4>Full Width</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Irwansyah Saputra</td>
                                        <td>2017-01-09</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Hasan Basri</td>
                                        <td>2017-01-09</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kusnadi</td>
                                        <td>2017-01-11</td>
                                        <td>
                                            <div class="badge badge-danger">Not Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Rizal Fakhri</td>
                                        <td>2017-01-11</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Isnap Kiswandi</td>
                                        <td>2017-01-17</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i
                                            class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span
                                            class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
