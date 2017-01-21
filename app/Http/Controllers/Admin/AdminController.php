<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class AdminController extends Controller
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
     * Admin index page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.record.index');
    }
}
