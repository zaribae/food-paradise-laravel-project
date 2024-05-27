<div class="tab-pane fade active show" id="paypal-setting" role="tabpanel" aria-labelledby="paypal-setting-tab">
    <div class="card-header">
        <h5>Paypal Settings</h5>
    </div>
    <div class="card-body border">
        <form action="{{ route('admin.payment-settings.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="paypal-status">Paypal Status</label>
                <select name="paypal_status" id="paypal-status" class="select2 form-control">
                    <option @selected(@$paymentsSetting['paypal_status'] === 1) value="1">Active</option>
                    <option @selected(@$paymentsSetting['paypal_status'] === 0) value="0">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="paypal-status">Paypal Account Mode</label>
                <select name="paypal_acc_mode" id="paypal-status" class="select2 form-control">
                    <option @selected(@$paymentsSetting['paypal_acc_mode'] === 'live') value="live">Live Mode</option>
                    <option @selected(@$paymentsSetting['paypal_acc_mode'] === 'sandbox') value="sandbox">Sandbox Mode</option>
                </select>
            </div>
            <div class="form-group">
                <label for="paypal-status">Paypal Country Name</label>
                <select name="paypal_country_name" id="paypal-status" class="select2 form-control">
                    <option value="">Select</option>
                    @foreach (config('country_list') as $key => $country)
                        <option @selected(@$paymentsSetting['paypal_country_name'] === $key) value="{{ $key }}">{{ $country }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="default-currency">Paypal Currency Name</label>
                <select name="paypal_currency" id="default-currency" class="select2 form-control">
                    <option value="">Select</option>
                    @foreach (config('currency.currency_list') as $currency)
                        <option @selected(@$paymentsSetting['paypal_currency'] === $currency) value="{{ $currency }}">
                            {{ $currency }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="site-name">Currency Rate (Per {{ config('settings.site_default_currency') }})</label>
                <input type="text" name="paypal_rate" class="form-control"
                    value="{{ @$paymentsSetting['paypal_rate'] }}" id="site-name">
            </div>
            <div class="form-group">
                <label for="site-name">Paypal Client ID</label>
                <input type="text" name="paypal_client_id" class="form-control"
                    value="{{ @$paymentsSetting['paypal_client_id'] }}" id="site-name">
            </div>
            <div class="form-group">
                <label for="site-name">Paypal Secret Key</label>
                <input type="text" name="paypal_secret" class="form-control"
                    value="{{ @$paymentsSetting['paypal_secret'] }}" id="site-name">
            </div>
            <div class="form-group">
                <label for="site-name">Paypal APP ID</label>
                <input type="text" name="paypal_app_id" class="form-control"
                    value="{{ @$paymentsSetting['paypal_app_id'] }}" id="site-name">
            </div>
            <div class="form-group">
                <label for="image-preview">Payment Logo</label>
                <div id="image-preview" class="image-preview">
                    <label for="image-lable">Choose File</label>
                    <input type="file" name="logo" id="image-upload">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': "url({{ $paymentsSetting['logo'] }})",
                'background-size': 'cover',
                'background-position': 'center center',
            })
        })
    </script>
@endpush
