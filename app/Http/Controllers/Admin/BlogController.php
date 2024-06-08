<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCommentDataTable;
use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCreateRequest;
use App\Http\Requests\Admin\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Display all Blogs Comments
     */
    function blogComment(BlogCommentDataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.blog.comments.index');
    }

    function commentStatusUpdate(string $commentId): RedirectResponse
    {
        $comment = BlogComment::findOrFail($commentId);

        $comment->status = !$comment->status;
        $comment->save();

        toastr()->success('Comment Status Updated Successfully!');

        return redirect()->back();
    }

    function commentDelete(string $commentId)
    {
        try {
            $comment = BlogComment::findOrFail($commentId);
            $comment->delete();

            return response([
                'status' => 'success',
                'message' => 'Blog Comments Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategory = BlogCategory::all();
        return view('admin.blog.components.create', compact('blogCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCreateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image');

        $blog = new Blog();

        $blog->user_id = auth()->user()->id;
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->status = $request->status;
        $blog->show_at_home = $request->show_at_home;
        $blog->save();

        toastr()->success('Blog Created Successfully!');

        return to_route('admin.blogs.index');
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
        $blogs = Blog::findOrFail($id);
        $blogCategory = BlogCategory::all();
        return view('admin.blog.components.edit', compact('blogs', 'blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, string $id)
    {
        // dd($request);
        $blog = Blog::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $blog->image);

        if ($request->image) {
            $blog->image = $imagePath;
        }

        if ($request->title != $blog->title) {
            $blog->slug = generateUniqueSlug('Blog', $request->title);
        }

        $blog->category_id = $request->category_id;

        $blog->update($request->validated());

        toastr()->success('Blogs updated successfully.');

        return to_route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $this->removeImage($blog->image);
            $blog->delete();

            return response([
                'status' => 'success',
                'message' => 'Blog Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
