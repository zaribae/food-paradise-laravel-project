<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubscriberDataTable;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    function index(SubscriberDataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.news-letter.index');
    }

    function sendNewsletter(Request $request): RedirectResponse
    {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required']
        ]);

        $subscribers = Subscriber::pluck('email')->toarray();

        Mail::to($subscribers)->send(new Newsletter($request->subject, $request->message));

        toastr()->success('Newsletter send Successfully!');

        return redirect()->back();
    }
}
