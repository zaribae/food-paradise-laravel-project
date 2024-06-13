<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialLinkCreateRequest;
use App\Models\SocialLink;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SocialLinkDataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.social-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-link.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialLinkCreateRequest $request): RedirectResponse
    {
        SocialLink::create($request->validated());

        toastr()->success('Social link created successfully.');

        return to_route('admin.social-link.index');
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
        $socialLink = SocialLink::findOrFail($id);
        return view('admin.social-link.components.edit', compact('socialLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialLinkCreateRequest $request, string $id)
    {
        $socialLink = SocialLink::findOrFail($id);

        $socialLink->update($request->validated());

        toastr()->success('Social link updated successfully.');

        return to_route('admin.social-link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $socialLink = SocialLink::findOrFail($id);
            $socialLink->delete();

            return response([
                'status' => 'success',
                'message' => 'Social Link Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
