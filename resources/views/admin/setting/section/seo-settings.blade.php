<div class="tab-pane fade" id="seo-settings" role="tabpanel" aria-labelledby="seo-settings-tab">
    <div class="card-header">
        <h5>SEO Settings</h5>
    </div>
    <div class="card-body border">
        <form action="{{ route('admin.seo-setting.update') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="site-name">SEO Title</label>
                <input type="text" name="site_seo_title" class="form-control"
                    value="{{ config('settings.site_seo_title') }}" id="site-name">
            </div>
            <div class="form-group">
                <label for="site-name">SEO Description</label>
                <textarea name="site_seo_description" id="seo_description" type="text" class="form-control">{{ config('settings.site_seo_description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="seo_key">SEO Keywords</label>
                <input type="text" id="seo_key" class="form-control inputtags" name="site_seo_keyword"
                    value="{{ config('settings.site_seo_keyword') }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(".inputtags").tagsinput('items')
    </script>
@endpush
