<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
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
