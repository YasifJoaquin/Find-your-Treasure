<div>
    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="w-5/6 h-4/5 m-auto rounded-xl bg-amber-900 flex flex-col justify-center">
            <div class="grid grid-cols-9 h-full text-center gap-4">
                <div class=" invisible"></div>
                <div class=" invisible"></div>
                <div class=" invisible"></div>
                <div class="col-span-3">
                    <div class="border-2 border-black flex justify-between mt-3 items-center bg-blue-900 rounded-xl">
                        <img src="{{ asset('src/clavo.png') }}" class="ml-2 w-10 h-10">
                        <h1 class="text-gray-200 text-2xl tracking-widest"> Mis Objetos Encontrados </h1>
                        <img src="{{ asset('src/clavo.png') }}" class="mr-2 w-10 h-10">
                    </div>
                </div>
                <div class=" invisible"></div>
                <div class=" invisible"></div>
                <div class=" invisible"></div>

                @foreach ($misobjetos as $objeto)
                    <div class="col-span-3 row-span-6">
                        <div class="w-4/6 h-4/5 mx-auto bg-amber-950">
                            <a href="{{ route('objeto.show', ['id' => $objeto->id]) }}">
                                <div class="h-full py-8">
                                    <div class="border-2 border-black w-4/5 h-40 mx-auto mt-3 mb-4 bg-gray-400 rounded-xl">
                                        <img src="{{ asset('storage/imagenes/' . $objeto->imagen) }}" alt="Imagen del objeto" class="h-full w-full rounded-xl">
                                    </div>

                                    <h2 class="text-2xl tracking-wider font-semibold px-4">
                                        {{ $objeto->objeto }}
                                    </h2>
                                    <h3 class="text-lg tracking-wider px-4 bg-">
                                        {{ $objeto->ubicacion }}
                                    </h3>
                                </div> 
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="col-span-9 mx-auto">
                    {{ $misobjetos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>