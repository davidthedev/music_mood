<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class GenresController extends Controller
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
     * Display a listing of all genres
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::orderBy('genre', 'asc')->get();

        return view('admin.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new genre
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genre.create');
    }

    /**
     * Store a newly created genre in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'genre' => 'required|alpha|unique:genres,genre|max:50'
        ]);

        $genre = new Genre;
        $genre->genre = $request->genre;
        $genre->save();

        return redirect()->route('genres.index')->with('status', 'Genre has been saved');;
    }

    /**
     * Show the form for editing the genre
     *
     * @param  \App\Models\Admin\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }

    /**
     * Update the genre in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Genre   $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $this->validate($request, [
            'genre' => 'required|alpha|unique:genres,genre|max:50'
        ]);

        $genre->update($request->all());

        return redirect()->route('genres.index')->with('status', 'Record has been updated');;
    }

    /**
     * Delete the genre from storage
     *
     * @param  \App\Models\Admin\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index');
    }
}
