@extends('layouts.indecs')

@section('Contenido')
<div class="relative h-screen">
    <!-- nav bar -->
    <div class="absolute inset-x-0 top-0 h-1/6 z-50">
        @livewire('menu')
    </div>
    
    <!-- Contenido -->
    <div class="absolute mt-32 right-0 flex flex-col items-center justify-center w-3/5">
        <div class="w-4/6 h-72 bg-amber-950 flex justify-center items-center relative mb-5">
            
            <p class="text-blue-900 text-center text-8xl font-bold absolute leading-snug">Encuentra tu tesoro</p>
        </div>
        @livewire('encuentralo-aqui')
    </div>

    @role('almirante')
    <h1>
        tienes rol almirante
    </h1>
    @endrole

    @if(!auth()->check())
        <div class="absolute bottom-0 right-0 mb-4 mr-20">
            <a href="{{ route('login') }}" class="bg-gray-300 hover:bg-cyan-900 hover:text-white text-black font-bold py-2 px-4 rounded-full mr-2 text-2xl">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="bg-gray-300 hover:bg-green-900 hover:text-white text-black font-bold py-2 px-4 rounded-full ml-2 text-2xl">Registrate</a>
        </div>
    @endif
</div>
@endsection