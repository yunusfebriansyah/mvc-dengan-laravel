<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        return view('admin.events.index', [
            'title' => 'Data Event',
            'events' => Event::all()
        ]);
    }

    public function show(Event $event)
    {
        return view('admin.events.show', [
            'title' => 'Detail Event : ' . $event->title,
            'event' => $event
        ]);
    }

    public function delete(Event $event)
    {
        Event::where('id', $event->id)->delete();
        return redirect('/admin/events')->with('success', 'Data Event berhasil dihapus.');
    }

}
