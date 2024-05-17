<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    function uploadImage(Request $request, $inputName, $oldPath = NULL, $path = '/uploads')
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};

            $extension = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $extension;

            $image->move(public_path($path), $imageName);

            //Delete previous file in database if updating to a new image
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $imageName;
        }

        return null;
    }
}
