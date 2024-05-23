@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Coupons</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Coupon</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Coupon Name</label>
                        <input name="name" id="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="code">Coupon Code</label>
                        <input name="code" id="code" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Coupon Quantity</label>
                        <input name="quantity" id="quantity" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="min_purchase_amount">Minimum Purchase Amount</label>
                        <input name="min_purchase_amount" id="min_purchase_amount" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="expired_date">Expired Date</label>
                        <input name="expired_date" id="expired_date" type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input name="discount" id="discount" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select">Discount Type</label>
                        <select name="discount_type" class="form-control" id="select">
                            <option value="percent">In Percent (%)</option>
                            <option value="amount">In Amount ({{ config('settings.site_currency_icon') }})</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectS">Status</label>
                        <select name="status" class="form-control" id="selectS">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
