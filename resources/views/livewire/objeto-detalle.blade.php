<div>
    <div class="relative z-50">
        @livewire('menu')
    </div>
    
    <div class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center mt-4">
        <div x-data="modal()" x-cloak class="w-screen">
        <div class="mt-6 flex justify-center items-center text-center w-full relative">
            <div class="relative w-4/5 top-0 left-0 h-auto flex flex-col bg-amber-950" name="a">
                <!-- Contenido del div con la propiedad "name=a" -->
                <h1 class="text-4xl tracking-widest my-5">
                    - {{ $estado }} -
                </h1>

                @if ( $estado != "no_reclamado")
                <div class="grid grid-cols-2 w-full mb-20 gap-2">
                    <div name="div1" class="col-span-1 h-96 flex">
                        <!-- Contenido del div1 -->
                        <div class="w-4/5 h-full mx-auto bg-gray-400 rounded-xl">
                            <img src="{{ asset('storage/imagenes/' . $detalles->imagen) }}" alt="Imagen del objeto" class="h-full w-full rounded-xl">
                        </div>
                    </div>
                    <div name="div2" class="col-span-1 h-96 flex flex-col">
                        <!-- Contenido del div2 -->
                        <div class="w-4/6 h-auto mx-auto rounded-xl py-5 px-4 text-center bg-amber-900">
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
                                @if ($detalles->user_id == Auth::user()->id || $rol == false)
                                    <div class="col-span-2 w-full flex mt-5 justify-center">
                                        <div class="w-1/6 mr-5">
                                            <a href="{{ route('objeto.edit', ['id' => $detalles->id]) }}" class="w-auto mx-auto">
                                                <img src="{{asset('src/cheque.png')}}" alt="" class="w-14 h-14 mx-auto">
                                                <h1 class="mt-1 text-xl"> Editar </h1>
                                            </a>
                                        </div>

                                        @if ($estado == "Perdido")
                                        <div class="w-1/6 ml-14 flex items-center justify-center">
                                            <button @click="openDevolver" class="w-auto mx-auto text-black tracking-wider py-2 px-4 rounded">
                                                <img src="{{asset('src/devolver.png')}}" alt="Boton de ocultar" class="w-14 h-14">
                                                <h1 class="mt-1 text-xl"> Devolver </h1>
                                            </button>
                                        </div>
                                        @elseif ($estado == "Encontrado")
                                        <div class="w-1/6 ml-14 flex items-center justify-center">
                                            <button @click="openDevolver" class="w-auto mx-auto text-black tracking-wider py-2 px-4 rounded">
                                                <img src="{{asset('src/devolver.png')}}" alt="Boton de ocultar" class="w-14 h-14">
                                                <h1 class="mt-1 text-xl"> Recuperar </h1>
                                            </button>
                                        </div>
                                        @endif

                                        <div class="w-1/6 ml-14">
                                            <button @click="openModal" class="w-auto mx-auto">
                                                <img src="{{asset('src/muerte.png')}}" alt="Boton de ocultar" class="w-14 h-14">
                                                <h1 class="mt-1 text-xl"> Eliminar </h1>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>

                        <!--Boton de eliminar cartel-->
                        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-red-400/70 opacity-75"></div>
                                </div>
                    
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    
                                <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 transform translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                    <div class="bg-amber-950 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-300 sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Icono del modal -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                </svg>
                                            </div>

                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-2xl leading-6 font-medium text-center text-red-600 tracking-wider" id="modal-headline">
                                                    Alto ahi marinero
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-xl text-center text-gray-900">
                                                        ¿Estás seguro de querer hacer desaparecer este pergamino?
                                                    </p>
                                                </div>
                                            </div>

                                            <button @click="closeModal" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                    
                                    <div class="bg-amber-950 px-4 py-3 sm:px-6 sm:flex sm:flex-col items-center">
                                        <button @click="closeModal" wire:click="eliminar('{{ $detalles->id }}')" class="w-1/6 mx-auto bg-amber-900 hover:bg-gray-400/70 py-1 border-2 border-black rounded-lg">
                                            <img src="{{asset('src/muerte.png')}}" alt="Boton de ocultar" class="w-10 h-10 mx-auto">
                                            <h1 class="text-xl"> Eliminar </h1>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <!--Boton de devolver objeto-->
                        @if ($estado == "Perdido")
                        <div x-show="isDevolverOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-red-400/70 opacity-75"></div>
                                </div>
                    
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    
                                <div x-show="isDevolverOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 transform translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                    <div class="bg-amber-950 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-300 sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Icono del modal -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                </svg>
                                            </div>

                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-2xl leading-6 font-medium text-center text-red-600 tracking-wider" id="modal-headline">
                                                    Ahoy Marinero!
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-xl text-center text-gray-900">
                                                        Estas seguro de que encontraste el objeto, si es asi ve a servicios generales para hacer la devolucion
                                                    </p>
                                                </div>
                                            </div>

                                            <button @click="closeDevolver" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                    
                                    <div class="bg-amber-950 px-4 py-3 sm:px-6 sm:flex sm:flex-col items-center">
                                        <button @click="closeDevolver" wire:click="devolver('{{ $detalles->id }}')" class="w-1/6 mx-auto bg-amber-900 hover:bg-gray-400/70 py-1 border-2 border-black rounded-lg">
                                            <img src="{{asset('src/devolver.png')}}" alt="Boton de ocultar" class="w-10 h-10 mx-auto">
                                            <h1 class="text-xl"> Creo que si </h1>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($estado == "Encontrado")
                        <div x-show="isDevolverOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-red-400/70 opacity-75"></div>
                                </div>
                    
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    
                                <div x-show="isDevolverOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 transform translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                    <div class="bg-amber-950 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-300 sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Icono del modal -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                </svg>
                                            </div>

                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-2xl leading-6 font-medium text-center text-red-600 tracking-wider" id="modal-headline">
                                                    Ahoy Marinero!
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-xl text-center text-gray-900">
                                                        Si estas seguro de que este objeto es tuyo, ve a servicios generales para hacerte la devolucion
                                                    </p>
                                                </div>
                                            </div>

                                            <button @click="closeDevolver" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                    
                                    <div class="bg-amber-950 px-4 py-3 sm:px-6 sm:flex sm:flex-col items-center">
                                        <button @click="closeDevolver" wire:click="devolver('{{ $detalles->id }}')" class="w-1/6 mx-auto bg-amber-900 hover:bg-gray-400/70 py-1 border-2 border-black rounded-lg">
                                            <img src="{{asset('src/devolver.png')}}" alt="Boton de ocultar" class="w-10 h-10 mx-auto">
                                            <h1 class="text-xl"> Si es mio </h1>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    
    <script>
        function modal() {
            return {
                isModalOpen: false,
    
                openModal() {
                    this.isModalOpen = true;
                },
    
                closeModal() {
                    this.isModalOpen = false;
                },
                
                
                
                isDevolverOpen:false,
                
                openDevolver() {
                    this.isDevolverOpen = true;
                },
                
                closeDevolver() {
                    this.isDevolverOpen = false;
                },
                
            };
        }
    </script>

</div>