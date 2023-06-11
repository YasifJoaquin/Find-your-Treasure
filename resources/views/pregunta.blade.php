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
            <div class="max-sm:w-5/6 sm:w-4/6 max-sm:h-auto sm:h-auto md:w-3/6 md:h-3/6 lg:w-3/5 lg:h-4/6 m-auto rounded-xl bg-amber-900 flex flex-col items-center">
                <h2 class="text-center font-bold mt-4 mb-4 tracking-wide text-black sm:text-xl max-sm:px-3 sm:px-3 sm:mb-4 sm:mt-4 md:text-2xl md:mb-8 md:mt-6 lg:text-3xl lg:mb-10 lg:mt-8 xl:text-4xl ">Argh, ¿Has perdido un tesoro? o ¿Has encontrado un tesoro?</h2>
                <div class="z-40 flex justify-between w-full sm:mb-2 md:mb-4 lg:mb-6">
                    <a href="{{ route('cperdido') }}" class="w-auto h-auto rounded-r-full bg-red-600 flex items-center justify-center hover:bg-blue-800 border-2 border-black" name="icono 1">
                        <img src="{{ asset('src/mapa.png')}}" alt="Icono" class="max-sm:w-20 sm:h-24 max-sm:p-2 sm:p-4 md:w-28 md:h-24 lg:w-32 lg:h-32 xl:w-36 xl:h-36 2xl:w-44 2xl:h-40 mx-4 mb-1">
                    </a>
                    <a href="{{ route('cencontrado') }}" class="w-auto h-auto rounded-l-full bg-red-600 flex items-center justify-center hover:bg-blue-800 border-2 border-black" name="icono 2">
                        <img src="{{ asset('src/pala.png')}}" alt="Icono" class="max-sm:w-20 sm:h-24 max-sm:p-2 sm:p-4 md:w-28 md:h-24 lg:w-32 lg:h-32 xl:w-36 xl:h-36 2xl:w-44 2xl:h-40 mx-4 mb-1">
                    </a>
                </div>
                <div class="z-50 flex justify-between w-full mb-5">
                    <p class="text-left text-black sm:text-lg md:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl pl-2 mt-2 tracking-wide">He perdido un tesoro</p>
                    <p class="text-right text-black sm:text-lg md:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl pr-2 mt-2 tracking-wide">He encontrado un tesoro</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>