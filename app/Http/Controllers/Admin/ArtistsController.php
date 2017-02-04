<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class ArtistsController extends Controller
{
    /**
     * Check if user is authenticated
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of all artists
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all()->sortBy('artist');

        return view('admin.artist.index', compact('artists'));
    }

    /**
     * Show the form for creating a new artist
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.create');
    }

    /**
     * Store a newly created artist in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'artist' => 'required|unique:artists,artist|max:50'
        ]);

        $artist = new Artist;
        $artist->artist = $request->artist;
        $artist->save();

        return redirect()->route('artists.index')->with('status', 'Artist has been saved');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the artist
     *
     * @param  App\Models\Admin\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('admin.artist.edit', compact('artist'));
    }

    /**
     * Update the artist in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $this->validate($request, [
            'artist' => 'required|unique:artists,artist|max:50'
        ]);

        $artist->update($request->all());

        return redirect()->route('artists.edit', ['artist' => $artist])->with('status', 'Artist has been updated');;
    }

    /**
     * Delete the artist from storage
     *
     * @param  \App\Models\Admin\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return redirect()->route('artists.index');
    }
}
