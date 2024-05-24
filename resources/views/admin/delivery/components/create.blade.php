@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Delivery Address</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Address</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.delivery-address.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="address">Delivery Address</label>
                        <textarea name="address" id="address" type="text" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="min_delivery_time">Minimum Delivery Time</label>
                                <input name="min_delivery_time" id="min_delivery_time" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_delivery_time">Maximum Delivery Time</label>
                                <input name="max_delivery_time" id="max_delivery_time" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="delivery_cost">Delivery Cost</label>
                                <input name="delivery_cost" id="delivery_cost" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selectS">Status</label>
                                <select name="status" class="form-control" id="selectS">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
