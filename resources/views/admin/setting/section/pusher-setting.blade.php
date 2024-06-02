<div class="tab-pane fade active" id="pusher-settings" role="tabpanel" aria-labelledby="pusher-settings-tab">
    <div class="card-header">
        <h5>Pusher Settings</h5>
    </div>
    <div class="card-body border">
        <form action="{{ route('admin.pusher-setting.update') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="pusher_app_id">Pusher App ID</label>
                <input type="text" name="pusher_app_id" class="form-control"
                    value="{{ config('settings.pusher_app_id') }}" id="pusher_app_id">
            </div>
            <div class="form-group">
                <label for="pusher_key">Pusher Key</label>
                <input type="text" name="pusher_key" class="form-control" value="{{ config('settings.pusher_key') }}"
                    id="pusher_key">
            </div>
            <div class="form-group">
                <label for="pusher_secret">Pusher Secret</label>
                <input type="text" name="pusher_secret" class="form-control"
                    value="{{ config('settings.pusher_secret') }}" id="pusher_secret">
            </div>
            <div class="form-group">
                <label for="pusher_cluster">Pusher Cluster</label>
                <input type="text" name="pusher_cluster" class="form-control"
                    value="{{ config('settings.pusher_cluster') }}" id="pusher_cluster">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
