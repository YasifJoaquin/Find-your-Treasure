<div>
    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="w-5/6 h-4/5 m-auto rounded-xl bg-center flex flex-col justify-center" style="background-image: url({{ asset('src/fondo-claro.png') }});">
            <form wire:submit.prevent="crearCartel" class="col-span-8 h-full">

                <div class="grid grid-cols-9 h-full text-center gap-4">
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-3">
                        <div class="border-2 border-black flex justify-between mt-3 items-center bg-red-600 rounded-xl">
                            <img src="{{ asset('src/clavo.png') }}" class="ml-2 w-10 h-10">
                            <h1 class="text-gray-200 text-2xl tracking-widest"> Objetos Perdidos </h1>
                            <img src="{{ asset('src/clavo.png') }}" class="mr-2 w-10 h-10">
                        </div>
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    @foreach ($objetos as $objeto)
                        <div class="col-span-3 row-span-6">
                            <div class="border w-4/6 h-5/6 mx-auto bg-center bg-cover" style="background-image: url({{ asset('src/cartel-index.png') }});">
                                <a href="{{ route('objeto.show', ['id' => $objeto->id]) }}">
                                    <h1 class="tracking-widest text-3xl mt-7 font-bold w-full">
                                        - {{ $objeto->estado }} -
                                    </h1>
                                    <div class="border-2 border-black w-3/5 h-3/6 mx-auto mt-3 bg-gray-300"></div>
                                    <h2 class="text-2xl tracking-wider font-semibold">
                                        {{ $objeto->objeto }}
                                    </h2>
                                    <h3 class="text-lg tracking-wider px-4">
                                        {{ $objeto->ubicacion }}
                                    </h3>
                                </a>
                            </div>
                        </div>
                    @endforeach


                    <div class="col-span-9 mx-auto">
                        {{ $objetos->links() }}
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>