@extends('layouts.indecs')
{{--
<x-menu />

<div class="fixed inset-0 z-0">
    <img src="{{ asset('src/barco.png')}}" alt="Barco" class="w-full h-full z-10">
</div>


-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-


    <div class="bg-cover bg-center h-20">
        <x-menu />
    </div>

    <div class="flex items-center justify-center absolute inset-0 z-10">
        <!-- Contenido del segundo div aquí -->
        
    </div>

    <div class="bg-cover bg-center flex-1">
        <img src="{{ asset('src/barco.png')}}" alt="Barco" class="w-full h-full object-cover">
    </div>


-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-


<div class="h-screen w-screen">
    <div class="h-1/6 w-full bg-green-500">
        <x-menu />
    </div>
    
    <div class="absolute inset-0 flex justify-center items-center">
        <div class="bg-white h-32 w-32 rounded-full shadow-lg z-10"></div>
    </div>

    <div class="h-80vh w-full flex items-center justify-center inset-0" style="background-image: url({{ asset('src/barco.png')}}); background-size: cover;">
    </div>
</div>



<div class=" border-4 w-screen h-screen border-red-600">

    <div class="w-full h-screen border-2 border-yellow-600">
        <img src="{{ asset('src/barco.png')}}" alt="Barco" class="w-full h-full">
    </div>

</div>



muestrame el diseño de un codigo tailwind que tenga un div "padre", el cual tenga una imagen dentro que ocupe todo el espacio, otro div "madre" que se muestre por encima del div padre y ocupe 20% de alto de la ventana y 100% de ancho, y un tercer div "hijo" que se muestre por encima de los divs anteriores y este centrado en la ventana
--}}

<div class="relative h-screen">
    <!-- Segundo fondo -->
    <div class="absolute inset-0">
        <img src="{{ asset('src/barco.png')}}" alt="Barco" class="w-full h-full object-cover" alt="">
    </div>

    <!-- nav bar -->
    <div class="absolute inset-x-0 top-0 h-1/6 z-50">
        @livewire('menu')
    </div>
    
    <!-- Contenido -->
    <div class="absolute mt-32 right-0 flex flex-col items-center justify-center w-3/5">
        <div class="w-4/6 h-72 flex justify-center items-center relative mb-5">
            <img src="{{ asset('src/cartel-index.png')}}" alt="Cartel buscar tu tesoro" class="object-cover w-full h-full">
            <p class="text-indigo-900 text-center text-8xl font-bold absolute leading-snug">Encuentra tu tesoro</p>
        </div>
        @livewire('encuentralo-aqui')
    </div>

    @if(!auth()->check())
        <div class="absolute bottom-0 right-0 mb-4 mr-20">
            <a href="{{ route('login') }}" class="bg-gray-300 hover:bg-cyan-900 hover:text-white text-black font-bold py-2 px-4 rounded-full mr-2 text-2xl">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="bg-gray-300 hover:bg-green-900 hover:text-white text-black font-bold py-2 px-4 rounded-full ml-2 text-2xl">Registrate</a>
        </div>
    @endif
</div>