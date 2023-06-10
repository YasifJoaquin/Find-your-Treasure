@extends('layouts.indecs')

@section('Contenido')
<div class="relative h-screen">
    <!-- nav bar -->
    <div class="absolute inset-x-0 top-0 h-1/6 z-50">
        @livewire('menu')
    </div>
    
    <!-- Contenido -->
    <div x-data="{icono_pregunta: false}" x-cloak class="absolute mt-32 right-0 flex flex-col items-center justify-center w-3/5">
        <div class="w-4/6 h-72 bg-amber-950 flex justify-center items-center relative mb-5">
            <p class="text-blue-900 text-center text-8xl font-bold absolute leading-snug">Encuentra tu tesoro</p>
        </div>
        <a href="{{ route('pregunta') }}" @mouseover="icono_pregunta = !icono_pregunta" @mouseout="icono_pregunta = !icono_pregunta" class="bg-red-600 border-2 border-black hover:bg-indigo-900 text-white py-2 px-24 mt-2 rounded-full mr-2 text-xl">Encuentralo Aqui</a>
        <div x-show="icono_pregunta" x-transition:enter="transition ease-out duration-400" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
            <x-pregunta></x-pregunta>
        </div>
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