<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            'auth',
        ];
    }
    public function index(User $user){
       return view('dashboard',[
        'user' => $user
       ]);
    }

    public function create(){
        return view('posts.create');
    }
}
