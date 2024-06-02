<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Livechat;
use Illuminate\Http\Request;

class LivechatController extends Controller
{
    function sendMessage(Request $request)
    {
        $request->validate([
            'message' => ['required', 'max:1000'],
            'receiver_id' => ['required', 'integer']
        ]);

        $livechat = new Livechat();

        $livechat->sender_id = auth()->user()->id;
        $livechat->receiver_id = $request->receiver_id;
        $livechat->message = $request->message;
        $livechat->save();

        return response([
            'status' => 'success',
        ]);
    }
}
