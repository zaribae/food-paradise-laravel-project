<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CounterUpdateRequest;
use App\Models\Counter;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CounterController extends Controller
{
    use FileUploadTrait;

    function index(): View
    {
        $counter = Counter::first();
        return view('admin.counter.index', compact('counter'));
    }

    function updateCounter(CounterUpdateRequest $request)
    {
        $backgroundImagePath = $this->uploadImage($request, 'background', $request->old_background);

        Counter::updateOrCreate(
            ['id' => 1],
            [
                'background' => !empty($backgroundImagePath) ? $backgroundImagePath : $request->old_background,
                'title' => $request->title,
                'icon_one' => $request->icon_one,
                'count_one' => $request->count_one,
                'name_one' => $request->name_one,
                'icon_two' => $request->icon_two,
                'count_two' => $request->count_two,
                'name_two' => $request->name_two,
                'icon_three' => $request->icon_three,
                'count_three' => $request->count_three,
                'name_three' => $request->name_three,
                'icon_four' => $request->icon_four,
                'count_four' => $request->count_four,
                'name_four' => $request->name_four,
            ]
        );

        toastr()->success('Counter Section Updated Successfully!');

        return to_route('admin.counter.index');
    }
}
