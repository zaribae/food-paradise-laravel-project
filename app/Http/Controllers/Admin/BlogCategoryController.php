<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.blog.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.blog.categories.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:blog_categories,name'],
            'status' => ['required', 'boolean'],
            'show_at_home' => ['required', 'boolean'],
        ]);

        $blogCategory = new BlogCategory();

        $blogCategory->name = $request->name;
        $blogCategory->slug = generateUniqueSlug('BlogCategory', $request->name);
        $blogCategory->status = $request->status;
        $blogCategory->show_at_home = $request->show_at_home;
        $blogCategory->save();

        toastr()->success('Blog Category Created Successfully!');

        return to_route('admin.blog-category.index');
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
        $blogCategory = BlogCategory::findOrFail($id);

        return view('admin.blog.categories.components.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:blog_categories,name,' . $id],
            'status' => ['required', 'boolean'],
            'show_at_home' => ['required', 'boolean'],
        ]);

        $blogCategory = BlogCategory::findOrFail($id);

        $blogCategory->name = $request->name;

        if ($blogCategory->name != $request->name) {
            $blogCategory->slug = generateUniqueSlug('BlogCategory', $request->name);
        }

        $blogCategory->status = $request->status;
        $blogCategory->show_at_home = $request->show_at_home;
        $blogCategory->save();

        toastr()->success('Blog Category Updated Successfully!');

        return to_route('admin.blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $blogCategory = BlogCategory::findOrFail($id);
            $blogCategory->delete();

            return response([
                'status' => 'success',
                'message' => 'Blog Category Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
