<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialCreateRequest;
use App\Http\Requests\Admin\TestimonialUpdateRequest;
use App\Models\SectionTitle;
use App\Models\Testimonial;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(TestimonialDataTable $dataTable): View|JsonResponse
    {
        $keys = ['testimonial_top_title', 'testimonial_main_title', 'testimonial_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');

        return $dataTable->render('admin.testimonials.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.testimonials.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image');

        $testimonial = new Testimonial();

        $testimonial->image = $imagePath;
        $testimonial->name = $request->name;
        $testimonial->area = $request->area;
        $testimonial->review = $request->review;
        $testimonial->rating = $request->rating;
        $testimonial->status = $request->status;
        $testimonial->show_at_home = $request->show_at_home;
        $testimonial->save();

        toastr()->success('Testimonial created successfully!');

        return to_route('admin.testimonials.index');
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
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.components.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialUpdateRequest $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $testimonial->image);

        if ($request->image) {
            $testimonial->image = $imagePath;
        }

        $testimonial->name = $request->name;
        $testimonial->area = $request->area;
        $testimonial->review = $request->review;
        $testimonial->rating = $request->rating;
        $testimonial->status = $request->status;
        $testimonial->show_at_home = $request->show_at_home;
        $testimonial->save();

        toastr()->success('Testimonial updated successfully.');

        return to_route('admin.testimonials.index');
    }

    function updateTitle(Request $request)
    {
        $validatedData = $request->validate([
            'testimonial_top_title' => ['nullable', 'max:100'],
            'testimonial_main_title' => ['nullable', 'max:200'],
            'testimonial_sub_title' => ['nullable', 'max:500']
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
            $testimonial = Testimonial::findOrFail($id);
            $this->removeImage($testimonial->image);
            $testimonial->delete();

            return response([
                'status' => 'success',
                'message' => 'Testimonial Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
