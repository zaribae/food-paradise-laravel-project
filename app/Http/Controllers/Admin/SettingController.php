<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    function index(): View
    {
        return view('admin.setting.index');
    }

    function updateGeneralSetting(Request $request)
    {
        $validatedData = $request->validate([
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
}
