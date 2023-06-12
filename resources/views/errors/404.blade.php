@extends('layouts.indecs')

@section('Contenido')
<div class="flex flex-col items-center justify-center h-screen bg-opacity-90">
    <div class="bg-amber-900 w-3/6 h-4/6 flex flex-col items-center justify-center shadow-2xl">
        <img src="{{asset('src/isla.png')}}" alt="Pirate Ship" class="w-40 h-40 mb-8">
        <h1 class="text-4xl text-black mb-4">¡Argh, isla no encontrada!</h1>
        <p class="text-xl text-red-600 mb-8">¡Esta página se ha perdido en el mar!</p>
        <a href="{{ route('indecs')}}" class="bg-yellow-500 mt-4 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded">
            Volver a la Isla Principal
        </a>
    </div>
</div>

@endsection