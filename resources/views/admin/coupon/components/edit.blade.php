@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Coupons</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Edit Coupon</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Coupon Name</label>
                        <input name="name" id="name" value="{{ $coupon->name }}" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="code">Coupon Code</label>
                        <input name="code" id="code" value="{{ $coupon->code }}" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Coupon Quantity</label>
                        <input name="quantity" id="quantity" value="{{ $coupon->quantity }}" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="min_purchase_amount">Minimum Purchase Amount</label>
                        <input name="min_purchase_amount" id="min_purchase_amount"
                            value="{{ $coupon->min_purchase_amount }}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="expired_date">Expired Date</label>
                        <input name="expired_date" id="expired_date" value="{{ $coupon->expired_date }}" type="date"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input name="discount" id="discount" value="{{ $coupon->discount }}" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select">Discount Type</label>
                        <select name="discount_type" class="form-control" id="select">
                            <option @selected($coupon->discount_type === 'percent') value="percent">In Percent (%)</option>
                            <option @selected($coupon->discount_type === 'amount') value="amount">In Amount
                                ({{ config('settings.site_currency_icon') }})</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectS">Status</label>
                        <select name="status" class="form-control" id="selectS">
                            <option @selected($coupon->status === 1) value="1">Active</option>
                            <option @selected($coupon->status === 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
