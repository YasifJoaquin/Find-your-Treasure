<x-app-layout>

    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="w-3/5 h-4/6 m-auto rounded-xl bg-center flex flex-col items-center" style="background-image: url({{ asset('src/fondo-claro.png') }});" name="fondo">
            <h2 class="text-center text-3xl font-bold mb-16 mt-8 tracking-wide text-slate-800">Argh, ¿Has perdido un tesoro? o ¿Has encontrado un tesoro?</h2>
            <div class="z-50 flex justify-between w-full">
                <a href="{{ route('cperdido') }}" class="w-auto h-auto rounded-r-full bg-red-600 flex items-center justify-center hover:bg-red-800 border-2 border-black" name="icono 1">
                    <img src="{{ asset('src/mapa.png')}}" alt="Icono" class="w-40 h-40 p-5 mx-8 mb-2">
                </a>
                <a href="{{ route('cencontrado') }}" class="w-auto h-auto rounded-l-full bg-red-600 flex items-center justify-center hover:bg-red-800 border-2 border-black" name="icono 2">
                    <img src="{{ asset('src/pala.png')}}" alt="Icono" class="w-40 h-40 p-5 mx-8 mb-2">
                </a>
            </div>
            <div class="z-50 flex justify-between w-full">
                <p class="text-center text-slate-800 text-2xl mt-2 ml-3 tracking-wide">He perdido un tesoro</p>
                <p class="text-center text-slate-800 text-2xl mt-2 mr-3 tracking-wide">He encontrado un tesoro</p>
            </div>
        </div>

    </div>
</x-app-layout>