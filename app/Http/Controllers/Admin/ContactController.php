<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    function index(): View
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    function update(ContactUpdateRequest $request): RedirectResponse
    {
        Contact::updateOrCreate(
            ['id' => 1],
            [
                'phone_1' => $request->phone_1,
                'phone_2' => $request->phone_1,
                'email_1' => $request->email_1,
                'email_2' => $request->email_2,
                'address' => $request->address,
                'map_address_link' => $request->map_address_link,
            ]
        );

        toastr()->success('Contact Updated successfully!');

        return redirect()->back();
    }
}
