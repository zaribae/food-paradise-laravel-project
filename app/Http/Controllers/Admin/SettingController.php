<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingsService;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingController extends Controller
{
    use FileUploadTrait;

    function index(): View
    {
        return view('admin.setting.index');
    }

    function updateGeneralSetting(Request $request)
    {
        $validatedData = $request->validate([
            'site_name' => ['required', 'max:255'],
            'site_email' => ['nullable', 'email', 'max:255'],
            'site_phone_number' => ['nullable', 'max:24'],
            'site_name' => ['required', 'max:255'],
            'site_default_currency' => ['required', 'max:5'],
            'site_currency_icon' => ['required', 'max:5'],
            'site_currency_icon_position' => ['required', 'max:50'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $siteSettings = app(SettingsService::class);
        $siteSettings->clearCachedSettings();

        toastr()->success('Settings Updated Successfully!');

        return redirect()->back();
    }

    function updateLogoSetting(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'logo' => ['nullable', 'image', 'max:2048'],
            'footer_logo' => ['nullable', 'image', 'max:2048'],
            'favicon' => ['nullable', 'image', 'max:2048'],
            'breadcrumb' => ['nullable', 'image', 'max:2048'],
        ]);

        foreach ($validatedData as $key => $value) {
            $imagePath = $this->uploadImage($request, $key);
            if (!empty($imagePath)) {
                $oldPath = config('settings.' . $key);
                $this->removeImage($oldPath);
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $imagePath],
                );
            }
        }

        $siteSettings = app(SettingsService::class);
        $siteSettings->clearCachedSettings();

        toastr()->success('Site Logo Settings Updated Successfully!');

        return redirect()->back();
    }

    function updateAppearanceSetting(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'site_color' => ['required']
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $siteSettings = app(SettingsService::class);
        $siteSettings->clearCachedSettings();

        toastr()->success('Site Appearance Settings Updated Successfully!');

        return redirect()->back();
    }

    function updatePusherSetting(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'pusher_app_id' => ['required', 'max:255'],
            'pusher_key' => ['required', 'max:255'],
            'pusher_secret' => ['required', 'max:255'],
            'pusher_cluster' => ['required', 'max:255'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $siteSettings = app(SettingsService::class);
        $siteSettings->clearCachedSettings();

        toastr()->success('Pusher Settings Updated Successfully!');

        return redirect()->back();
    }

    function updateMailSetting(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'mail_driver' => ['required', 'max:255'],
            'mail_host' => ['required', 'max:255'],
            'mail_port' => ['required', 'max:255'],
            'mail_username' => ['required', 'max:255'],
            'mail_password' => ['required', 'max:255'],
            'mail_encryption' => ['required', 'max:255'],
            'mail_from_address' => ['required', 'max:255', 'email'],
            'mail_receive_address' => ['required', 'max:255', 'email'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $siteSettings = app(SettingsService::class);
        $siteSettings->clearCachedSettings();
        Cache::forget('mail_settings');

        toastr()->success('Mail Settings Updated Successfully!');

        return redirect()->back();
    }

    function updateSeoSetting(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'site_seo_title' => ['required', 'max:255'],
            'site_seo_description' => ['nullable', 'max:500'],
            'site_seo_keyword' => ['nullable']
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }

        $siteSettings = app(SettingsService::class);
        $siteSettings->clearCachedSettings();

        toastr()->success('Site SEO Settings Updated Successfully!');

        return redirect()->back();
    }
}
