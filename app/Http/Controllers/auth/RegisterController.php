<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index(){
        return view('auth.register');
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return mixed|RedirectResponse
     */
    public function store(Request $request): RedirectResponse{
       // dd($request);

       $request->request->add(['username' => Str::slug($request->username,'_')]);

       $request->validate([
        'name' => 'required|max:30',
        'username' => ['required','unique:users','min:3','max:20'],
        'email' => ['required','unique:users','email','max:60'],
        'password' => ['required','confirmed','min:6']
       ]);

       User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
       ]);

       // Autenticar usuario
       /*Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
       ]);*/

       // Otra forma de autenticar
       Auth::attempt($request->only('email','password'));

       return redirect()->route('posts.index');
    }
}
