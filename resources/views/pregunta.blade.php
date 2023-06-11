<x-app-layout>

    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        {{-- <div class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center mt-10">
            <div class="w-3/5 h-4/6 m-auto rounded-xl bg-center flex flex-col items-center" style="background-image: url({{ asset('src/fondo-claro.png') }});" name="fondo">
                <h2 class="text-center text-3xl font-bold mb-16 mt-8 tracking-wide text-slate-800">Argh, ¿Has perdido un tesoro? o ¿Has encontrado un tesoro?</h2>
                <div class="z-40 flex justify-between w-full">
                    <a href="{{ route('cperdido') }}" class="w-auto h-auto rounded-r-full bg-red-600 flex items-center justify-center hover:bg-blue-800 border-2 border-black" name="icono 1">
                        <img src="{{ asset('src/mapa.png')}}" alt="Icono" class="w-40 h-40 p-5 mx-8 mb-2">
                    </a>
                    <a href="{{ route('cencontrado') }}" class="w-auto h-auto rounded-l-full bg-red-600 flex items-center justify-center hover:bg-blue-800 border-2 border-black" name="icono 2">
                        <img src="{{ asset('src/pala.png')}}" alt="Icono" class="w-40 h-40 p-5 mx-8 mb-2">
                    </a>
                </div>
                <div class="z-50 flex justify-between w-full">
                    <p class="text-center text-slate-800 text-2xl mt-2 ml-3 tracking-wide">He perdido un tesoro</p>
                    <p class="text-center text-slate-800 text-2xl mt-2 mr-3 tracking-wide">He encontrado un tesoro</p>
                </div>
            </div>
        </div> --}}

        <div class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center">
            <div class="max-sm:w-5/6 sm:w-5/6 md:w-3/6 h-auto m-auto rounded-xl bg-amber-900 flex flex-col items-center">
                <h2 class="text-center font-bold mt-4 mb-4 tracking-wide text-black sm:text-lg max-sm:px-3 sm:px-3 md:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl">Argh, ¿Has perdido un tesoro? o ¿Has encontrado un tesoro?</h2>
                <div class="z-40 flex justify-between w-full">
                    <a href="{{ route('cperdido') }}" class="w-auto h-auto rounded-r-full bg-red-600 flex items-center justify-center hover:bg-blue-800 border-2 border-black" name="icono 1">
                        <img src="{{ asset('src/mapa.png')}}" alt="Icono" class="max-sm:w-20 sm:h-20 sm:p-2 max-sm:p-2 mx-4 mb-1">
                    </a>
                    <a href="{{ route('cencontrado') }}" class="w-auto h-auto rounded-l-full bg-red-600 flex items-center justify-center hover:bg-blue-800 border-2 border-black" name="icono 2">
                        <img src="{{ asset('src/pala.png')}}" alt="Icono" class="max-sm:w-20 sm:h-20 sm:p-2 max-sm:p-2 mx-4 mb-1">
                    </a>
                </div>
                <div class="z-50 flex justify-between w-full mb-5">
                    <p class="text-left text-black sm:text-lg md:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl px-4 mt-2 tracking-wide">He perdido un tesoro</p>
                    <p class="text-right text-black sm:text-lg md:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl px-4 mt-2 tracking-wide">He encontrado un tesoro</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>