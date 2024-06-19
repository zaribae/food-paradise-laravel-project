<div class="tab-pane fade active show" id="appearance-setting" role="tabpanel" aria-labelledby="appearance-setting-tab">
    <div class="card-header">
        <h5>Site Appearance Settings</h5>
    </div>
    <div class="card-body border">
        <form action="{{ route('admin.appearance-setting.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group col-6">
                <label>Pick Your Color</label>
                <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                    <input type="text" class="form-control" name="site_color"
                        value="{{ config('settings.site_color') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-fill-drip"></i>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
