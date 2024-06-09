<div class="tab-pane fade active" id="mail-settings" role="tabpanel" aria-labelledby="mail-settings-tab">
    <div class="card-header">
        <h5>Mail Settings</h5>
    </div>
    <div class="card-body border">
        <form action="{{ route('admin.mail-setting.update') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="mail_driver">Mail Driver</label>
                        <input type="text" name="mail_driver" class="form-control" id=""
                            value="{{ config('settings.mail_driver') }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="mail_host">Mail Host</label>
                        <input type="text" name="mail_host" class="form-control" id=""
                            value="{{ config('settings.mail_host') }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="mail_port">Mail Port</label>
                        <input type="text" name="mail_port" class="form-control" id=""
                            value="{{ config('settings.mail_port') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="mail_username">Mail Username</label>
                        <input type="text" name="mail_username" class="form-control" id=""
                            value="{{ config('settings.mail_username') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="mail_password">Mail Password</label>
                        <input type="text" name="mail_password" class="form-control" id=""
                            value="{{ config('settings.mail_password') }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="mail_encryption">Mail Encryption</label>
                <input type="text" name="mail_encryption" class="form-control" id=""
                    value="{{ config('settings.mail_encryption') }}">
            </div>
            <div class="form-group">
                <label for="mail_from_address">Mail From Address</label>
                <input type="text" name="mail_from_address" class="form-control" id=""
                    value="{{ config('settings.mail_from_address') }}">
            </div>
            <div class="form-group">
                <label for="mail_receive_address">Mail Receive Address</label>
                <input type="text" name="mail_receive_address" class="form-control" id=""
                    value="{{ config('settings.mail_receive_address') }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
