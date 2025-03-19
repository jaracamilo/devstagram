@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ Auth::user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" enctype="multipart/form-data" method="POST" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ Auth::user()->username }}">
                        @error('username')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Tu Correo"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ Auth::user()->email }}">
                        @error('email')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password Actual</label>
                    <input
                        type="password"
                        name="current_password"
                        id="current_password"
                        placeholder="Escribe tu password actual"
                        class="border p-3 w-full rounded-lg @error('current_password') border-red-500 @enderror">
                        @if(session('mensaje'))
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                        @endif
                </div>
                <div class="mb-5">
                    <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password de Registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu Password"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil</label>
                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        accept=".jpg,.jpeg,.png"
                        class="border p-3 w-full rounded-lg "
                        value="{{ Auth::user()->username }}">

                </div>

                <input
                    type="submit"
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
