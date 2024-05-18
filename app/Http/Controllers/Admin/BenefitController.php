<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BenefitDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BenefitCreateRequest;
use App\Models\Benefit;
use App\Models\SectionTitle;
use Illuminate\Contracts\View\View;
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
    public function create(): View
    {
        return view('admin.benefit.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BenefitCreateRequest $request)
    {
        Benefit::create($request->validated());

        toastr()->success('Benefit content Created Successfully!');

        return to_route('admin.benefit.index');
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
    public function edit(string $id): View
    {
        $benefit = Benefit::findOrFail($id);
        return view('admin.benefit.components.edit', compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BenefitCreateRequest $request, string $id)
    {
        $benefit = Benefit::findOrFail($id);

        $benefit->update($request->validated());

        toastr()->success('Benefit content Updated Successfully!');

        return to_route('admin.benefit.index');
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
        try {
            $benefit = Benefit::findOrFail($id);
            $benefit->delete();

            return response([
                'status' => 'success',
                'message' => 'Slider Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
