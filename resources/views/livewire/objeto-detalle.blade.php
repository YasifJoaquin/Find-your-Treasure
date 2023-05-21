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
                    - {{ $detalles->estado }} -
                </h1>

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
                        </div>

                        @if ($detalles->estado == 2)
                            <h1 class="text-gray-600 tracking-wider text-xl"> Encontrado por: <span class="text-black tracking-wide text-lg"> {{ $detalles->user->nombres }} </span> </h1>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
