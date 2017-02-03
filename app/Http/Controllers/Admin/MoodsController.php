<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Mood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class MoodsController extends Controller
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
     * Display a listing of the moods
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moods = Mood::orderBy('mood', 'asc')->get();
        return view('admin.mood.index', compact('moods'));
    }

    /**
     * Show the form for creating a new mood
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mood.create');
    }

    /**
     * Store a newly created mood in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mood' => 'required|alpha|unique:moods,mood|max:50'
        ]);

        $mood = new Mood;
        $mood->mood = $request->mood;
        $mood->save();

        return redirect()->route('moods.index');
    }

    /**
     * Display the mood
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the mood
     *
     * @param  \App\Models\Admin\Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function edit(Mood $mood)
    {
        return view('admin.mood.edit', compact('mood'));
    }

    /**
     * Update the specified mood in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mood $mood)
    {
        $this->validate($request, [
            'mood' => 'required|alpha|unique:moods,mood|max:50'
        ]);

        $mood->update($request->all());

        return redirect()->route('moods.index');
    }

    /**
     * Remove the specified mood from storage
     *
     * @param  \App\Models\Admin\Mood $mood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mood $mood)
    {
        $mood->delete();

        return redirect()->route('moods.index');
    }
}
