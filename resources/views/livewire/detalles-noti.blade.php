<div>

    <div class="w-full h-full">
        <div class="h-1/6">
            @livewire('menu')
        </div>
    
        {{-- <div class="mt-14 border-2 border-black mx-auto h-96 py-20 px-10 w-5/6 flex justify-center items-center text-center relative bg-amber-9">
            <ul>
                <li>
                    {{ $detalles->id }}
                </li>
                <li>
                    {{ $detalles->type }}
                </li>
                <li>
                    {{ $detalles->notifiable_type }}
                </li>
                <li> Datos del Objeto:
                    <ul>
                        @foreach ($detalles->data as $item)
                        <li>
                            - {{ $item }}
                        </li>
                    @endforeach
                    </ul>
                </li>
            </ul>
        </div> --}}

        <div class="relative top-0 left-0 w-5/6 mt-10 h-auto flex flex-col bg-amber-950 mx-auto">
            <!-- Contenido del div con la propiedad "name=a" -->
            <h1 class="text-4xl tracking-widest my-5 text-center">
                - {{ $detalles->data['estado'] }} -
            </h1>

            
                {{-- <div class="col-span-1 h-96 flex items-center">
                    <!-- Contenido del div1 -->
                    <div class="w-3/6 h-5/6 mx-auto bg-gray-400 rounded-xl">
                        <img src="{{ asset('storage/imagenes/' . $detalles->data['imagen']) }}" alt="Imagen del objeto" class="h-full w-full rounded-xl">
                    </div>
                </div> --}}
                <div class="h-auto flex flex-col">
                    <!-- Contenido del div2 -->
                    <div class="w-4/6 h-auto rounded-xl px-8 text-center bg-amber-900 mx-auto mb-7">
                        <div class="grid grid-cols-2 mt-5">
                            <div>
                                <div class="w-5/6 h-60 mx-auto bg-gray-400 rounded-xl">
                                    <img src="{{ asset('storage/imagenes/' . $detalles->data['imagen']) }}" alt="Imagen del objeto" class="h-full w-full rounded-xl">
                                </div>
                            </div>

                            <div class="h-full">
                                <p class="text-black tracking-wide text-lg mt-2"> <span class="text-gray-600 tracking-wider text-xl"> Objeto: </span> {{ $detalles->data['objeto']  }} </p>
                                <p class="text-black tracking-wide text-lg mt-2"> <span class="text-gray-600 tracking-wider text-xl"> Marca: </span> {{ $detalles->data['marca']  }} </p>
                                <p class="text-black tracking-wide text-lg mt-2"> <span class="text-gray-600 tracking-wider text-xl"> Color: </span> {{ $detalles->data['color']  }} </p>
                                <p class="text-black tracking-wide text-lg mt-2"> <span class="text-gray-600 tracking-wider text-xl"> Ubicacion: <br> </span> {{ $detalles->data['ubicacion']  }} </p>
                                <p class="text-black tracking-wide text-lg mt-2"> <span class="text-gray-600 tracking-wider text-xl"> Descripcion: <br> </span> {{ $detalles->data['descripcion']  }} </p>
                                @if ($detalles->data['estado'] == "Perdido")
                                    <div>
                                        <p class="text-center text-gray-600 tracking-wider text-xl">
                                            Importancia:
                                        </p>
                                        <div class="flex justify-center">
                                            @for ($i = 1; $i <= $cantidad_valor; $i++)
                                                <img src="{{ asset('src/tesoro.png') }}" alt="Imagen {{ $i }}" class="w-12 h-12 ml-2 mt-2">
                                            @endfor
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-span-2 w-full flex mt-5">
                                <div class="w-1/2">
                                    <button wire:click="aceptar_noti('{{ $detalles->id }}','{{ $detalles->data['id'] }}')" class="w-auto mx-auto">
                                        <img src="{{asset('src/cheque.png')}}" alt="" class="w-14 h-14">
                                        <h1 class="mt-1 text-xl"> Aceptar </h1>
                                    </button>
                                </div>
                                <div class="w-1/2">
                                    <button wire:click="rechazar_noti('{{ $detalles->id }}','{{ $detalles->data['id'] }}')" class="w-auto mx-auto">
                                        <img src="{{asset('src/muerte.png')}}" alt="" class="w-14 h-14">
                                        <h1 class="mt-1 text-xl"> Rechazar </h1>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>
