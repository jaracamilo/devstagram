<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return ['auth'];
    }
    public function __invoke()
    {
        // Obtener a quienes seguimos
        $ids = Auth::user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id',$ids)->latest()->paginate(20);
        return view('home',[
            'posts' => $posts
        ]);
    }
}
