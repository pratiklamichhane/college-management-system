<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class);
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('auth.login');
    }

    //register

    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        // Auth::login($user);

        return redirect('users')->with('success', 'User created successfully');
    }

    
    //edit user
    public function edit($id){
        $user = User::find($id);
        return view('auth.edit',compact('user'));
    }
    //update user
    public function update(UserRequest $request,$id){
        $validated = $request->validated();
        $user = User::find($id);
        $user->update($validated);
        return redirect()->route('users');
    }

    //delete user
    public function destroy($id){
        $user = User::find($id);
        $user->delete();    
        return redirect()->route('users');
}
}