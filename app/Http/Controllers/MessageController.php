<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $message = Message::with(['user'])->get();
        return response()->json($message);
    }

    public function store(Request $request)
    {
        $message = $request->user()->messages()->create([
            'content' => $request->content
        ]);
        
        broadcast(new MessageCreated($message))
            ->toOthers();

        return response()->json($message);
    }
}
