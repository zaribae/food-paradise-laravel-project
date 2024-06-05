<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MenuSliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuSliderCreateRequest;
use App\Http\Requests\Admin\MenuSliderUpdateRequest;
use App\Models\MenuSlider;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuSliderController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(MenuSliderDataTable $dataTable)
    {
        return $dataTable->render('admin.menu-slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.menu-slider.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuSliderCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'banner');

        $menuSlider = new MenuSlider();

        $menuSlider->title = $request->title;
        $menuSlider->sub_title = $request->sub_title;
        $menuSlider->url = $request->url;
        $menuSlider->banner = $imagePath;
        $menuSlider->status = $request->status;
        $menuSlider->save();

        toastr()->success('Menu Slider created successfully.');

        return to_route('admin.menu-slider.index');
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
        $menuSlider = MenuSlider::findOrFail($id);

        return view('admin.menu-slider.components.edit', compact('menuSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuSliderUpdateRequest $request, string $id)
    {
        $menuSlider = MenuSlider::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'banner', $menuSlider->banner);

        if ($request->banner) {
            $menuSlider->banner = $imagePath;
        }

        $menuSlider->title = $request->title;
        $menuSlider->sub_title = $request->sub_title;
        $menuSlider->url = $request->url;
        $menuSlider->status = $request->status;
        $menuSlider->save();

        toastr()->success('Menu slider updated successfully.');

        return to_route('admin.menu-slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $menuSlider = MenuSlider::findOrFail($id);
            $this->removeImage($menuSlider->banner);
            $menuSlider->delete();

            return response([
                'status' => 'success',
                'message' => 'Menu Slider Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
