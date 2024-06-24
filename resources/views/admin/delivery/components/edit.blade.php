@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Delivery Address</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Edit Address</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.delivery-area.update', $deliveryAddress->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="address">Area Name</label>
                        <textarea name="area_name" id="address" type="text" class="form-control">{{ $deliveryAddress->area_name }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="min_delivery_time">Minimum Delivery Time</label>
                                <input name="min_delivery_time" id="min_delivery_time"
                                    value="{{ $deliveryAddress->min_delivery_time }}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_delivery_time">Maximum Delivery Time</label>
                                <input name="max_delivery_time" id="max_delivery_time"
                                    value="{{ $deliveryAddress->max_delivery_time }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="delivery_cost">Delivery Cost</label>
                                <input name="delivery_cost" id="delivery_cost" value="{{ $deliveryAddress->delivery_cost }}"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selectS">Status</label>
                                <select name="status" class="form-control" id="selectS">
                                    <option @selected($deliveryAddress->status === 1) value="1">Active</option>
                                    <option @selected($deliveryAddress->status === 0) value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
