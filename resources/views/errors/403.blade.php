@extends('layouts.indecs')

@section('Contenido')
<div class="flex flex-col items-center justify-center h-screen bg-opacity-90">
    <div class="bg-amber-900 w-3/6 h-4/6 flex flex-col items-center justify-center shadow-2xl">
        <img src="{{asset('src/pala.png')}}" alt="Pirate Ship" class="w-32 h-32 mb-8">
        <h1 class="text-4xl text-black my-4">¡Argh, acceso denegado!</h1>
        <p class="text-xl text-red-600 mb-8">¡Alto ahi marinero no tienes la experiencia suficiente para navegar por estos oceanos!</p>
        <a href="{{ route('indecs')}}" class="bg-yellow-500 mt-4 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded">
            Volver a la Isla Principal
        </a>
    </div>
</div>

@endsection