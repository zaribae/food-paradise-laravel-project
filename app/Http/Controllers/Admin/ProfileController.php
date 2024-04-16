<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;;

class ProfileController extends Controller
{
    function index(): View
    {
        return view('admin.profile.index');
    }

    function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user_id = Auth::user()->id;

        $user = User::where('id', $user_id)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        toastr('Profile Updated Successfully!', 'success');
        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdateRequest $request): RedirectResponse
    {
        $user_id = Auth::user()->id;

        $user = User::where('id', $user_id)->first();

        $user->password = bcrypt($request->password);

        $user->save();

        toastr('Password Updated Successfully!', 'success');
        return redirect()->back();
    }
}
