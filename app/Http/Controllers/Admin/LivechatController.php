<?php

namespace App\Http\Controllers\Admin;

use App\Events\LivechatEvent;
use App\Http\Controllers\Controller;
use App\Models\Livechat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LivechatController extends Controller
{
    function index(): View
    {
        $userId = auth()->user()->id;

        $chats = Livechat::select('sender_id')
            ->where('receiver_id', $userId)
            ->where('sender_id', '!=', $userId)
            ->selectRaw('MAX(created_at) as latest_message_sent')
            ->groupBy('sender_id')
            ->orderBy('latest_message_sent', 'desc')
            ->get();

        return view('admin.livechat.index', compact('chats'));
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

    function sendMessages(Request $request)
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
}
