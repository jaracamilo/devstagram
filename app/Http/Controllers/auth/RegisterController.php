<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * @return void
     */
    public function store(Request $request): void{
       // dd($request);

       $request->validate([
        'name' => 'required|max:30',
        'username' => ['required','unique:users','min:3','max:20'],
        'email' => ['required','unique:users','email','max:60'],
        'password' => ['required']
       ]);
    }
}
