<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.organizers.index', [
            'title' => 'Data Organizer',
            'organizers' => Organizer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organizers.create', [
            'title' => 'Tambah Data Organizer'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'contact' => 'required|max:13|unique:organizers,contact',
            'email' => 'required|max:255|unique:organizers,email|email',
        ]);

        Organizer::create($validated);

        return redirect('/admin/organizers')->with('success', 'Data Organizer berhasil ditambah.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Organizer $organizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organizer $organizer)
    {
        return view('admin.organizers.edit', [
            'title' => 'Ubah Data Organizer',
            'organizer' => $organizer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organizer $organizer)
    {
        $rules = [
            'name' => 'required|max:255',
            'contact' => 'required|max:13',
            'email' => 'required|max:255|email',
        ];

        # kalo contact atau emailnya ga diubah, skip aja unique nya
        # kalo contact atau emailnya diubah maka lakukan pengecekan unique
        if( $request->contact != $organizer->contact ) :
            $rules['contact'] = 'required|max:13|unique:organizers,contact';
        endif;
        if( $request->email != $organizer->email ) :
            $rules['email'] = 'required|max:255|unique:organizers,email|email';
        endif;

        $validated = $request->validate($rules);

        Organizer::find($organizer->id)->update($validated);

        return redirect('/admin/organizers')->with('success', 'Data Organizer berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizer $organizer)
    {
        Organizer::find($organizer->id)->delete();

        return redirect('/admin/organizers')->with('success', 'Data Organizer berhasil dihapus.');
    }
}
