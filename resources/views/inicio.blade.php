@extends('layouts.indecs')

@section('Contenido')
<div class="relative h-screen">
    <!-- nav bar -->
    <div class="absolute inset-x-0 top-0 h-1/6 z-50">
        @livewire('menu')
    </div>
    
    <!-- Contenido para resolucion md, lg, xl, 2xl -->
    <div x-data="{icono_pregunta: false}" x-cloak class="max-sm:hidden absolute mt-32 right-0 flex flex-col items-center justify-center w-3/5">
        <div class="w-4/6 h-72 bg-amber-950 flex justify-center items-center relative mb-5">
            <p class="text-blue-900 text-center sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl 2xl:text-9xl font-bold absolute leading-snug">Encuentra tu tesoro</p>
        </div>
        <a href="{{ route('pregunta') }}" @mouseover="icono_pregunta = !icono_pregunta" @mouseout="icono_pregunta = !icono_pregunta" class="bg-red-600 border-2 border-black hover:bg-indigo-900 text-white py-2 mt-2 rounded-full mr-2 sm:px-6 sm:text-xl max-sm:px-6 max-sm:text-xl lg:text-4xl xl:px-20">Encuentralo Aqui</a>
        <div x-show="icono_pregunta" x-transition:enter="transition ease-out duration-400" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
            <x-pregunta></x-pregunta>
        </div>
    </div>

    @if(!auth()->check())
        <div class="max-sm:hidden absolute bottom-0 right-0 mb-4 mr-20">
            <a href="{{ route('login') }}" class="bg-gray-300 hover:bg-cyan-900 hover:text-white text-black font-bold py-2 px-4 rounded-full mr-2 text-2xl">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="bg-gray-300 hover:bg-green-900 hover:text-white text-black font-bold py-2 px-4 rounded-full ml-2 text-2xl">Registrate</a>
        </div>
    @endif

    {{-- Diseño para celulares (sm) --}}
    <div x-data="{icono_pregunta: false}" x-cloak class="sm:hidden absolute mt-24 right-0 flex flex-col items-center justify-center w-full">
        <div class="w-5/6 h-60 bg-amber-950 flex justify-center items-center relative mb-5">
            <p class="text-blue-900 text-center text-5xl font-bold absolute leading-snug">Encuentra tu tesoro</p>
        </div>
        <a href="{{ route('pregunta') }}" @mouseover="icono_pregunta = !icono_pregunta" @mouseout="icono_pregunta = !icono_pregunta" class="bg-red-600 border-2 border-black hover:bg-indigo-900 text-white py-2 px-14 mt-2 rounded-full mr-2 text-2xl">Encuentralo Aqui</a>
        <div x-show="icono_pregunta" x-transition:enter="transition ease-out duration-400" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
            <x-pregunta></x-pregunta>
        </div>
    </div>
    @if(!auth()->check())
        <div class="sm:hidden absolute bottom-0 right-0 mb-4 flex justify-center w-full">
            <a href="{{ route('login') }}" class="bg-gray-300/70 text-black font-bold py-2 px-4 rounded-full mr-2 text-2xl">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="bg-gray-300/70 text-black font-bold py-2 px-4 rounded-full ml-2 text-2xl">Registrate</a>
        </div>
    @endif
</div>
@endsection