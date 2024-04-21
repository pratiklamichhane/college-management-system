<?php

namespace App\Http\Controllers;
use App\Models\User;


class UserController extends Controller
{
    //show users
    public function index()
    {
        //get all users
        $users = User::all();
        return view('users.index', compact('users'));
    }

    //users delete
    public function destroy($id)
    {
        //find user by id
        $user = User::find($id);
        //delete user
        $user->delete();
        return redirect()->route('users');
    }
}
