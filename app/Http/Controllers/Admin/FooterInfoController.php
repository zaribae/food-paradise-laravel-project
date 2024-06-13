<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterInfoController extends Controller
{
    function index(): View
    {
        $footerInfo = FooterInfo::first();

        return view('admin.footer-info.index', compact('footerInfo'));
    }

    function update(Request $request)
    {
        $validatedData = $request->validate([
            'short_description' => ['nullable', 'max:500'],
            'address' => ['nullable', 'max:255'],
            'phone' => ['nullable', 'max:24'],
            'email' => ['nullable', 'email', 'max:255'],
            'copyright' => ['nullable', 'max:255'],
        ]);

        FooterInfo::updateOrCreate(
            ['id' => 1],
            $validatedData
        );

        toastr()->success('Footer Info updated successfully.');

        return redirect()->back();
    }
}
