<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
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

    public function create()
    {
        return view('admin.events.create', [
            'title' => 'Tambah Data Event',
            'organizers' => Organizer::all()
        ]);
    }

    public function store(Request $request)
    {
        // validasi
        # kalo lolos dia bakal lanjut ke syntax berikutnya
        # kalo ga lolos maka bakal balik ke halaman form input dengan setor errornya
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required|max:255',
            'organizer_id' => 'required|exists:organizers,id'
        ]);

        // lakukan insert data
        Event::create($validated);
        return redirect('/admin/events')->with('success', 'Data Event berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', [
            'title' => 'Edit Data Event',
            'organizers' => Organizer::all(),
            'event' => $event
        ]);
    }

    public function update(Request $request, Event $event)
    {
        // validasi
        # kalo lolos dia bakal lanjut ke syntax berikutnya
        # kalo ga lolos maka bakal balik ke halaman form input dengan setor errornya
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required|max:255',
            'organizer_id' => 'required|exists:organizers,id'
        ]);

        // lakukan update data
        Event::find($event->id)->update($validated);
        return redirect('/admin/events')->with('success', 'Data Event berhasil diubah.');
    }

    public function delete(Event $event)
    {
        Event::where('id', $event->id)->delete();
        return redirect('/admin/events')->with('success', 'Data Event berhasil dihapus.');
    }

}
