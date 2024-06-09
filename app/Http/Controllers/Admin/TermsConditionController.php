<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TermsConditionController extends Controller
{
    function index(): View
    {
        $termsCondition = TermsCondition::first();
        return view('admin.terms-condition.index', compact('termsCondition'));
    }

    function update(Request $request): RedirectResponse
    {
        $request->validate([
            'content' => ['required']
        ]);

        TermsCondition::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr()->success('Terms & Condition updated successfully.');

        return redirect()->back();
    }
}
