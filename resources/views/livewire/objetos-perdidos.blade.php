<div>
    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="w-5/6 h-auto m-auto rounded-xl flex flex-col justify-center bg-amber-900">
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
                        <div class="w-4/6 h-5/6 mx-auto bg-amber-950">
                            <a href="{{ route('objeto.show', ['id' => $objeto->id]) }}">
                                <div class="h-full pb-20">
                                    <h1 class="tracking-widest text-3xl font-bold w-full pt-5">
                                        - {{ $objeto->estado }} -
                                    </h1>
                                    <div class="w-4/5 h-40 mx-auto mt-3 mb-2 bg-gray-300">
                                        <img src="{{ asset('storage/imagenes/' . $objeto->imagen) }}" alt="Imagen del objeto" class="w-full h-full">
                                    </div>
    
                                    <h2 class="text-2xl tracking-wider font-semibold px-4">
                                        {{ $objeto->objeto }}
                                    </h2>
                                    <h3 class="text-lg tracking-wider px-4">
                                        {{ $objeto->ubicacion }}
                                    </h3>
                                </div> 
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="col-span-9 mx-auto mb-5">
                    {{ $objetos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>