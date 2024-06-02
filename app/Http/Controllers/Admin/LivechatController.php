<?php

namespace App\Http\Controllers\Admin;

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
        $userChats = User::where('id', '!=', $userId)
            ->whereHas('livechats', function ($query) use ($userId) {
                $query->where(function ($subQuery) use ($userId) {
                    $subQuery->where('sender_id', $userId)
                        ->orWhere('receiver_id', $userId);
                });
            })
            ->orderBy('created_at', 'desc')
            ->distinct()
            ->get();

        return view('admin.livechat.index', compact('userChats'));
    }

    function getMessages(string $senderId): Response
    {
        $receiverId = auth()->user()->id;

        $messages = Livechat::whereIn('sender_id', [$senderId, $receiverId])
            ->whereIn('receiver_id', [$receiverId, $senderId])
            ->orderBy('created_at', 'asc')
            ->get();

        return response($messages);
    }
}
