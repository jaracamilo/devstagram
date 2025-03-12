<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');
        $nombre_imagen = Str::uuid(). "." .$imagen->extension();
        $image = Image::read($imagen)
                    ->resize(1000, 1000);
        $imagenPath = public_path('uploads'). "/" . $nombre_imagen;
        $image->save($imagenPath);

        return response()->json(['imagen' => $nombre_imagen]);
    }
}
