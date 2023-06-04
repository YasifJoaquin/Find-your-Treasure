<div>
    <div class="relative">
        @livewire('menu')
    </div>
    
    <div>
        <div class="mt-6 flex justify-center items-center text-center relative">
            <div class="relative top-0 left-0 w-5/6 h-auto flex flex-col bg-amber-950" name="a">
                <!-- Contenido del div con la propiedad "name=a" -->
                <h1 class="text-4xl tracking-widest my-5">
                    - {{ $estado }} -
                </h1>

                @if ( $estado != "no_reclamado")
                <div class="grid grid-cols-2 w-full mb-20 gap-2">
                    <div name="div1" class="col-span-1 h-96 flex items-center">
                        <!-- Contenido del div1 -->
                        <div class="w-3/5 h-full mx-auto bg-gray-400 rounded-xl">
                            <img src="{{ asset('storage/imagenes/' . $detalles->imagen) }}" alt="Imagen del objeto" class="h-full w-full rounded-xl">
                        </div>
                    </div>
                    <div name="div2" class="col-span-1 h-96 flex flex-col">
                        <!-- Contenido del div2 -->
                        <div class="w-4/6 h-auto mx-auto rounded-xl py-5 px-8 text-center bg-amber-900">
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

                        <div>
                            @if ($estado == "Encontrado")
                                <h1 class="text-gray-600 tracking-wider text-xl mt-5"> Encontrado por: <span class="text-black tracking-wide text-lg"> {{ $detalles->user->nombres }} </span> </h1>
                            @endif

                            @if(auth()->check())
                                @if ($detalles->user_id == Auth::user()->id)
                                    <div class="col-span-2 w-full flex mt-5 justify-center">
                                        <div class="w-1/6 mr-14">
                                            <a href="{{ route('objeto.edit', ['id' => $detalles->id]) }}" class="w-auto mx-auto">
                                                <img src="{{asset('src/cheque.png')}}" alt="" class="w-14 h-14 mx-auto">
                                                <h1 class="mt-1 text-xl"> Editar </h1>
                                            </a>
                                        </div>
                                        <div class="w-1/6 ml-14">
                                            <button wire:click="eliminar('{{ $detalles->id }}')" class="w-auto mx-auto">
                                                <img src="{{asset('src/muerte.png')}}" alt="Boton de ocultar" class="w-14 h-14">
                                                <h1 class="mt-1 text-xl"> Eliminar </h1>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>

                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
