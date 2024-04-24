<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
// use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller
{

//    public function __construct()
//    {
//        $this->authorizeResource(User::class);
//    }
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
        return redirect('login');
    }

    //register

    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)


    {
        
        $rawPassword = Str::random(8);
        $password = Hash::make($rawPassword);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8',
            'role' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $password;
        $imageName = time().'.'.$request->image->extension();
        $image = ImageManager::gd()->read($request->image);
        $image->resize(100, 100);
        $image->save('profile/'.$imageName);
        $user->save();
    
        //send mail after registration message confirm

        Mail::send('mail' , ['user' => $user , 'password' => $rawPassword], function($message) use ($user){
            $message->to($user->email);
            $message->subject('Welcome to our website');
        });

        
        return redirect('users')->with('success', 'User created successfully');
    }


    //edit user
    public function edit($id){
        $user = User::find($id);
        return view('auth.edit',compact('user'));
    }
    //update user
    public function update(UserRequest $request,$id){
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage'), $imageName);
            $validated = $request->validated();
            $validated['image'] = $imageName;
        } else {
            $validated = $request->validated();
        }
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
    //show function

    public function profile(){
        $id = Auth::id();
        $user = User::find($id);
        return view('profile.profile' ,
        compact('user'));
    }

}
