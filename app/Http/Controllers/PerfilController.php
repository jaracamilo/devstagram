<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;


class PerfilController extends Controller
{
    public static function middleware(){
        return [
            new Middleware('auth')
        ];
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username,'_')]);

        $request->validate([
            'username' => ['required','unique:users,username,'. Auth::user()->id,'min:3','max:20', 'not_in:twitter,editar-perfil'],
            'email' => ['email','max:60',Rule::unique('users')->ignore(Auth::user()->id)],
            'password' => ['confirmed']
        ]);


        if($request->current_password)
        {
            if(!Auth::attempt(['email' => Auth::user()->email,'password' => $request->current_password]))
            {
                return back()->with("mensaje","el password ingresado no es correcto");
            }

        }
        if($request->imagen)
        {
            $imagen = $request->file('imagen');
            $nombre_imagen = Str::uuid(). "." .$imagen->extension();
            $image =  Image::read($imagen)->resize(1000, 1000);
            $imagenPath = public_path('perfiles'). "/" . $nombre_imagen;
            $image->save($imagenPath);
        }

        $usuario = User::find(Auth::user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email ?? Auth::user();
        $usuario->password = Hash::make($request->password) ?? Auth::user()->password;
        $usuario->imagen = $nombre_imagen ?? Auth::user()->imagen ?? '';
        $usuario->save();



        return redirect()->route('posts.index',$usuario->username);
    }
}
