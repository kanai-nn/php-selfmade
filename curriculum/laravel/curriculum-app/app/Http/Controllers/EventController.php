<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function getEvents()
    {
        $userId = session('member_id');
        $events = Event::where('user_id', $userId)->get();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $userId = session('member_id');
        $validated = $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'start' => $validated['start'],
            'end' => $validated['end'],
            'user_id' => $userId, 
        ]);

        return response()->json($event);
    }

    public function destroy($id)
    {
        // イベントを削除
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'イベントが正常に削除されました']);
    }
}
