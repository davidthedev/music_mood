<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller as Controller;

class UsersController extends Controller
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
     * Show the form for editing the user details
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', auth()->id())->first();

        return view('admin.user.index', ['user' => $user]);
    }

    /**
     * Update the user details in storage
     *
     * @return \Illuminate\Http\Response
     */
    public function updateDetails(Request $request)
    {
        User::where('id', auth()->id())
            ->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

        return redirect()->route('user.index')->with('status', 'Details have been saved');;
    }

    /**
     * Show the form for editing the user password
     *
     * @return \Illuminate\Http\Response
     */
    public function showPassword()
    {
        $user = User::where('id', auth()->id())->first();

        return view('admin.user.password', ['user' => $user]);
    }

    /**
     * Update the user password in storage
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $user = User::where('id', auth()->id())->first();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
        }

        return redirect()->route('user.index')->with('status', 'Password has been updated');;
    }
}
