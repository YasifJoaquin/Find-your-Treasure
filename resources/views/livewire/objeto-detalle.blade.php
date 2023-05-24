<div>
    <div class="relative">
        @livewire('menu')
    </div>
    
    <div>
        <div class="mt-6 flex justify-center items-center text-center relative">
            {{-- Fondo cartel --}}
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('src/cartel-index.png')}}" alt="Barco" class="w-11/12 h-full object-cover mx-auto" alt="fondo perfil">
            </div>

            <div class="relative top-0 left-0 w-5/6 h-auto flex flex-col" name="a">
                <!-- Contenido del div con la propiedad "name=a" -->
                <h1 class="text-4xl tracking-widest mt-5">
                    - {{ $estado }} -
                </h1>

                @if ( $estado != "no_reclamado")
                <div class="grid grid-cols-2 w-full mb-20 gap-2">
                    <div name="div1" class="col-span-1 h-96 flex items-center">
                        <!-- Contenido del div1 -->
                        <div class="border-2 border-black w-3/5 h-full mx-auto bg-gray-400 rounded-xl">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div name="div2" class="col-span-1 h-96 flex flex-col">
                        <!-- Contenido del div2 -->
                        <div class="w-4/6 h-auto mx-auto rounded-xl bg-cover bg-center py-5 px-8 text-center" style="background-image: url({{ asset('src/fondo-claro.png') }}) ;">
                            <p class="text-black tracking-wide text-lg"> <span class="text-gray-600 tracking-wider text-xl"> Objeto: </span> {{ $detalles->objeto  }} </p>
                            <p class="text-black tracking-wide text-lg"> <span class="text-gray-600 tracking-wider text-xl"> Marca: </span> {{ $detalles->marca  }} </p>
                            <p class="text-black tracking-wide text-lg"> <span class="text-gray-600 tracking-wider text-xl"> Color: </span> {{ $detalles->color  }} </p>
                            <p class="text-black tracking-wide text-lg"> <span class="text-gray-600 tracking-wider text-xl"> Ubicacion: </span> {{ $detalles->ubicacion  }} </p>
                            <p class="text-black tracking-wide text-lg"> <span class="text-gray-600 tracking-wider text-xl"> Descripcion: </span> {{ $detalles->descripcion  }} </p>
                            @if ($estado == "Perdido")
                                <div>
                                    <p class="text-center text-gray-600 tracking-wider text-xl">
                                        Importancia:
                                    </p>
                                    <div class="flex">
                                        @for ($i = 1; $i <= $cantidad_valor; $i++)
                                            <img src="{{ asset('src/tesoro.png') }}" alt="Imagen {{ $i }}" class="w-12 h-12 ml-2 mt-2">
                                        @endfor
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if ($estado == "Encontrado")
                            <h1 class="text-gray-600 tracking-wider text-xl mt-5"> Encontrado por: <span class="text-black tracking-wide text-lg"> {{ $detalles->user->nombres }} </span> </h1>
                        @elseif ($user == Auth::user()->id)
                        {{-- <a href="{{ route('objeto.edit', ['id' => $objeto->id]) }}" class="w-2/6 mx-auto mt-5 bg-red-500 text-gray-200 rounded-full p-2 tracking-widest text-lg border-2 border-black"> --}}
                        <a href="{{ route('objeto.edit', ['id' => $detalles->id]) }}" class="w-2/6 mx-auto mt-5 bg-red-500 text-gray-200 rounded-full p-2 tracking-widest text-lg border-2 border-black">
                            Editar
                        </a>
                        @endif

                        @if ($estado == "Encontrado" && $user == Auth::user()->id)
                            {{-- <a href="{{ route('objeto.edit', ['id' => $objeto->id]) }}" class="w-2/6 mx-auto mt-5 bg-red-500 text-gray-200 rounded-full p-2 tracking-widest text-lg border-2 border-black"> --}}
                            <a href="{{ route('objeto.edit', ['id' => $detalles->id]) }}" class="w-2/6 mx-auto mt-5 bg-red-500 text-gray-200 rounded-full p-2 tracking-widest text-lg border-2 border-black">
                                Editar
                            </a>
                        @endif

                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    
</div>
