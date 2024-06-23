<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ResetDatabaseController extends Controller
{
    function index()
    {
        return view('admin.reset-database.index');
    }

    function destroy()
    {
        try {
            // Wipe Database
            Artisan::call('migrate:fresh');

            // Seed Default Data
            Artisan::call('db:seed', ['--class' => 'UserSeeder']);
            Artisan::call('db:seed', ['--class' => 'SettingSeeder']);
            Artisan::call('db:seed', ['--class' => 'PaymentGatewaySettingSeeder']);
            Artisan::call('db:seed', ['--class' => 'MenuBuilderSeeder']);
            Artisan::call('db:seed', ['--class' => 'SectionTitleSeeder']);
            Artisan::call('db:seed', ['--class' => 'BenefitSeeder']);

            return response([
                'status' => 'success',
                'message' => 'Database Wiped Successfully',
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'success',
                'message' => 'Unexpected Error occurred!',
            ]);
        }
    }

    function deleteFiles()
    {
        $path = public_path('uploads');
        $preserveFiles = ['avatar-1.png', 'slider_img_1.png', 'slider_img_2.png', 'slider_img_3.png', 'paypal-logo.png', 'logo.png', 'footer_logo.png', 'counter_bg.jpg', 'favicon.png'];

        $allFiles = File::allFiles($path);

        foreach ($allFiles as $file) {
            $filename = $file->getFilename();

            if (!in_array($filename, $preserveFiles)) {
                File::delete($file->getPathname());
            }
        }
    }
}