<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BenefitDataTable;
use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use Random\Engine\Secure;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BenefitDataTable $dataTable)
    {
        $keys = ['benefit_top_title', 'benefit_main_title', 'benefit_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $dataTable->render('admin.benefit.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateTitle(Request $request)
    {
        $request->validate([
            'benefit_top_title' => ['nullable', 'max:100'],
            'benefit_main_title' => ['nullable', 'max:200'],
            'benefit_sub_title' => ['nullable', 'max:500']
        ]);

        SectionTitle::updateOrCreate(
            ['key' => 'benefit_top_title'],
            ['value' => $request->benefit_top_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'benefit_main_title'],
            ['value' => $request->benefit_main_title]
        );

        SectionTitle::updateOrCreate(
            ['key' => 'benefit_sub_title'],
            ['value' => $request->benefit_sub_title]
        );

        toastr()->success('Section Titles Updated Successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
