<x-guest-layout>
    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center mt-10">
            <div class="w-5/6 h-4/5 m-auto rounded-xl bg-center flex flex-col justify-center" style="background-image: url({{ asset('src/fondo-claro.png') }});">
            <div class="w-full h-1/6 text-5xl tracking-widest flex justify-center items-center font-bold max-sm:text-lg max-sm:px-5">
                <h1> - Tripulación de este Barco - </h1>
            </div>

            <div class="w-full h-5/6 inline-flex max-sm:flex max-sm:flex-col max-sm:justify-center max-sm:items-center">
                <div class="w-1/3 h-full flex justify-center items-center">
                    <img src="{{ asset('src/1.png') }}" alt="Capitan" class="w-5/6 h-6/6 max-sm:w-3/4 max-sm:4/5">
                </div>
                <div class="w-1/3 h-full flex justify-center items-center">
                    <img src="{{ asset('src/2.png') }}" alt="Capitan" class="w-5/6 h-6/6 max-sm:w-3/4 max-sm:4/5">
                </div>
                <div class="w-1/3 h-full flex justify-center items-center">
                    <img src="{{ asset('src/3.png') }}" alt="Capitan" class="w-5/6 h-6/6 max-sm:w-3/4 max-sm:4/5">
                </div>
            </div>
        </div>
        </div>
    </div>
</x-guest-layout>