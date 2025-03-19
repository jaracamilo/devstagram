@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')

   <x-listar-post :posts="$posts"/>
        {{-- <x-slot:titulo>
            <header>Esto es un header</header>
        </x-slot:titulo>
        <h1>Mostrando post desde slot</h1> --}}
   {{-- </x-listar-post> --}}

@endsection
