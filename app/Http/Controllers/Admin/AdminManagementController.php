<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminManagementDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminManagementDataTable $dataTable)
    {
        return $dataTable->render('admin.admin-management.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.admin-management.components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'in:admin'],
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Admin Created Successfully.');

        return to_route('admin.admin-management.index');
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
        $admin = User::findOrFail($id);
        return view('admin.admin-management.components.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($id === 1) {
            throw ValidationException::withMessages(["You can't update Super Admin data!"]);
        }

        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id],
            'role' => ['required', 'in:admin'],
        ]);

        if ($request->password) {
            $request->validate([
                'password' => ['confirmed', 'min:8'],
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        toastr()->success('Admin Updated Successfully.');

        return to_route('admin.admin-management.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            if ($id === 1) {
                throw ValidationException::withMessages(["You can't delete Super Admin data!"]);
            }
            $user = User::findOrFail($id);
            $user->delete();

            return response([
                'status' => 'success',
                'message' => 'Admin Deleted Successfully!'
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => 'Something went wrong, Please try again!',
            ]);
        }
    }
}
