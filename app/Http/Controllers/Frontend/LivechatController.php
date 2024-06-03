<?php

namespace App\Http\Controllers\Frontend;

use App\Events\LivechatEvent;
use App\Http\Controllers\Controller;
use App\Models\Livechat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LivechatController extends Controller
{
    function sendMessage(Request $request)
    {
        $request->validate([
            'message' => ['required', 'max:1000'],
            'receiver_id' => ['required', 'integer']
        ]);

        $livechat = new Livechat();
        $senderId = auth()->user()->id;

        $livechat->sender_id = $senderId;
        $livechat->receiver_id = $request->receiver_id;
        $livechat->message = $request->message;
        $livechat->save();

        $profilePict = asset(auth()->user()->image);

        broadcast(new LivechatEvent($request->message, $request->receiver_id, $senderId, $profilePict))->toOthers();

        return response([
            'status' => 'success',
            'message_id' => $request->message_temp_id
        ]);
    }

    function getMessages(string $senderId): Response
    {
        $receiverId = auth()->user()->id;

        Livechat::where('sender_id', $senderId)
            ->where('receiver_id', $receiverId)
            ->where('seen', 0)
            ->update([
                'seen' => 1
            ]);

        $messages = Livechat::whereIn('sender_id', [$senderId, $receiverId])
            ->whereIn('receiver_id', [$receiverId, $senderId])
            ->with(['sender'])
            ->orderBy('created_at', 'asc')
            ->get();

        return response($messages);
    }
}
