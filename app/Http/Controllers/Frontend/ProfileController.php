<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;

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

    function updatePicture(Request $request)
    {
        $imagePath = $this->uploadImage($request, 'image');

        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        $user->image = $imagePath;
        $user->save();

        toastr('Profile Picture Updated Successfully!', 'success');
        return response([
            'status' => 'success',
            'message' => 'Profile Picture Updated Successfully!'
        ]);
    }
}
