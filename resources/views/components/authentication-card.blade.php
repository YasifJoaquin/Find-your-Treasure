<div class="absolute inset-0 z-50 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="absolute top-0 left-0 mt-4 ml-4" name="regresar">
        <a href="/" class="bg-red-500 hover:bg-red-700 text-gray-200 text-2xl tracking-widest py-2 px-4 rounded">
            Atras
        </a>
    </div>
    
    <div class="w-full sm:max-w-md mt-1 bg-red-200 px-6 z-50 bg-center" style="background-image: url({{ asset('src/fondo-claro.png') }});">
    <div class="">
        {{ $logo }}
    </div>

    <div>
        {{ $slot }}
    </div>
</div>