<div class="tab-pane fade active show" id="general-setting" role="tabpanel" aria-labelledby="general-setting-tab">
    <div class="card-header">
        <h5>General Settings</h5>
    </div>
    <div class="card-body border">
        <form action="{{ route('admin.setting.general-setting.update') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="site-name">Site Name</label>
                <input type="text" name="site_name" class="form-control" value="{{ config('settings.site_name') }}"
                    id="site-name">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="site-name">Site Email</label>
                        <input type="text" name="site_email" class="form-control"
                            value="{{ config('settings.site_email') }}" id="site-name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="site-name">Site Phone Number</label>
                        <input type="text" name="site_phone_number" class="form-control"
                            value="{{ config('settings.site_phone_number') }}" id="site-name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="default-currency">Default Currency</label>
                <select name="site_default_currency" id="default-currency" class="select2 form-control">
                    <option value="">Select</option>
                    @foreach (config('currency.currency_list') as $currency)
                        <option @selected(config('settings.site_default_currency') === $currency) value="{{ $currency }}">
                            {{ $currency }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="currency-icon">Currency Icon</label>
                        <input name="site_currency_icon" type="text" class="form-control" id="currency-icon"
                            value="{{ config('settings.site_currency_icon') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="default-currency">Currency Icon Position</label>
                        <select name="site_currency_icon_position" id="" class="select2 form-control">
                            <option @selected(config('settings.site_currency_icon_position') === 'right') value="right">Right</option>
                            <option @selected(config('settings.site_currency_icon_position') === 'left') value="left">Left</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
