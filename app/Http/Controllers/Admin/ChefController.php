<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ChefDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChefCreateRequest;
use App\Http\Requests\Admin\ChefUpdateRequest;
use App\Models\Chef;
use App\Models\SectionTitle;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChefController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ChefDataTable $dataTable): View|JsonResponse
    {
        $keys = ['chef_top_title', 'chef_main_title', 'chef_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');

        return $dataTable->render('admin.chef.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.chef.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChefCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image');

        $chef = new Chef();

        $chef->image = $imagePath;
        $chef->name = $request->name;
        $chef->title = $request->title;
        $chef->fb = $request->fb;
        $chef->in = $request->in;
        $chef->x = $request->x;
        $chef->ig = $request->ig;
        $chef->status = $request->status;
        $chef->show_at_home = $request->show_at_home;
        $chef->save();

        toastr()->success('Chef created successfully!');

        return to_route('admin.chef.index');
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
        $chef = Chef::findOrFail($id);

        return view('admin.chef.components.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChefUpdateRequest $request, string $id)
    {
        $chef = Chef::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $chef->image);

        if ($request->image) {
            $chef->image = $imagePath;
        }

        $chef->name = $request->name;
        $chef->title = $request->title;
        $chef->fb = $request->fb;
        $chef->in = $request->in;
        $chef->x = $request->x;
        $chef->ig = $request->ig;
        $chef->status = $request->status;
        $chef->show_at_home = $request->show_at_home;
        $chef->save();

        toastr()->success('Chef updated successfully.');

        return to_route('admin.chef.index');
    }

    function updateTitle(Request $request)
    {
        $validatedData = $request->validate([
            'chef_top_title' => ['nullable', 'max:100'],
            'chef_main_title' => ['nullable', 'max:200'],
            'chef_sub_title' => ['nullable', 'max:500']
        ]);

        foreach ($validatedData as $key => $value) {
            SectionTitle::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }


        toastr()->success('Section Titles Updated Successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $chef = Chef::findOrFail($id);
            $this->removeImage($chef->image);
            $chef->delete();

            return response([
                'status' => 'success',
                'message' => 'Chef Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
