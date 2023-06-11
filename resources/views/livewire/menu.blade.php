<div x-data="data()" x-cloak x-init="start()">
    <!-- Menu 2xl, xl, lg, md-->
    <div x-data="{mostrar_icono: null}" x-cloak>
        @role(['vigia', 'almirante', 'capitan'])
            <div class="grid grid-cols-2 text-base max-sm:hidden sm:text-lg sm:grid-cols-3 lg:grid-cols-5 rounded-full bg-red-600 h-auto mt-3 w-5/6 mx-auto">
                <a href="{{ url('/') }}">
                    <div class="hidden sm:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2">
                        <p class="tracking-widest mt-1 text-xl">
                            Inicio
                        </p>
                    </div>
                </a>
                
                <a href="{{ route('filament.resources.users.index') }}">
                    <div class="hidden sm:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2">
                        <p class="tracking-widest mt-1 text-xl">
                            Usuarios
                        </p>
                    </div>
                </a>
                <a href="{{ route('operdidos') }}">
                    <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2">
                        <p class="tracking-widest mt-1 text-xl">
                            Objetos Perdidos
                        </p>
                    </div>
                </a>
                
                <!--{{-- <a href="{{ route('magradecimientos') }}"> --}}-->
                <a href="#eventos">
                    <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2">
                        <p class="tracking-widest mt-1 text-xl">
                            Eventos
                        </p>
                    </div>
                </a>
                <!--{{-- <a href="{{ route('nosotros') }}"> --}}-->
                
                    <div @click="abierto()" class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 relative cursor-pointer">
                        {{-- Detalles de notificacion --}}
                        <button class="w-1/6 pt-1 mx-auto h-full">
                            <img src="{{ asset('src/campana.png') }}" alt="Notificacion" class="object-cover">
                        </button>
                        <div x-show="showDiv" x-on:click.away="cerrado()" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed top-14 right-1 w-2/6 h-auto mt-1 z-50 bg-gray-200/90 rounded-xl cursor-default" name="yo">
                            @if ($cantidad_noti == 0)
                                <h1 class="py-14 tracking-widest text-3xl px-1">
                                    Sin Notificaciones
                                </h1>
                            @else
                                <div class="w-full h-10 mt-2 border-b-2 border-gray-400">
                                    <div class="w-full flex">
                                        <div class="w-3/6 mt-1">
                                            <h1 class="text-xl">
                                                {{ $cantidad_noti }} notificaciones nuevas
                                            </h1>
                                        </div>
                                        <a href="{{ route('notificaciones') }}" class="w-3/6">
                                            <div class="border-2 border-black w-5/6 mx-auto rounded-full">
                                                Ver todos
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="w-full">
                                    @foreach (auth()->user()->unreadNotifications as $notificaciones)
                                        <a href="{{ route('noti.chow', $notificaciones->id) }}" class="grid grid-cols-3 border-b-2 border-gray-400 hover:bg-blue-500">
                                            <div class="row-span-3 m-auto">
                                                <img src="{{ asset('src/pirataa.png') }}" alt="icono" width="50" height="50">
                                            </div>
                                            <div class="col-span-2"> Objeto: {{ $notificaciones->data['objeto'] }} </div>
                                            <div class="col-span-1 text-left px-2"> Estado: {{ $notificaciones->data['estado'] }} </div>
                                            <div class="col-span-1 text-left px-2"> Atte: {{ $notificaciones->data['user_id'] }} </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    
                        @if (auth()->user()->unreadNotifications->count() > 0)
                        <div class="absolute top-1 right-16 bg-blue-500 rounded-full h-6 w-6 flex items-center justify-center">
                            <p class="text-black tracking-wide"> {{ $cantidad_noti }} </p>
                        </div>
                        @endif
                    </div>
            </div>
        @else
        <div class="grid text-base max-sm:hidden sm:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 rounded-full bg-red-600 h-auto mt-3 w-10/12 mx-auto sm:text-base md:text-lg">
            <a href="{{ url('/') }}">
                <div class="hidden sm:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" @mouseover="mostrar_icono = 1" @mouseout="mostrar_icono = null">
                    <p class="tracking-widest">
                        Inicio
                    </p>
                </div>
            </a>

            @if(auth()->check())
            <a href="{{ route('profile.show') }}">
                <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" @mouseover="mostrar_icono = 2" @mouseout="mostrar_icono = null">
                    <p class="tracking-widest">
                        {{ Auth::user()->nombres }}
                    </p>
                </div>
            </a>
            @else
            <a href="{{ route('login') }}">
                <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" @mouseover="mostrar_icono = 2" @mouseout="mostrar_icono = null">
                    <p class="tracking-widest">
                        Perfil
                    </p>
                </div>
            </a>
            @endif
            
            <a href="{{ route('pregunta') }}">
                <div class="hidden sm:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" @mouseover="mostrar_icono = 3" @mouseout="mostrar_icono = null">
                    <p class="tracking-widest">
                        Crear Cartel
                    </p>
                </div>
            </a>
            <a href="{{ route('operdidos') }}">
                <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" @mouseover="mostrar_icono = 4" @mouseout="mostrar_icono = null">
                    <p class="tracking-widest">
                        Carteles
                    </p>
                </div>
            </a>
            <a href="{{ route('magradecimientos') }}">
                <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" @mouseover="mostrar_icono = 5" @mouseout="mostrar_icono = null">
                    <p class="tracking-widest">
                        Mis Agradecimientos
                    </p>
                </div>
            </a>
            <a href="{{ route('nosotros') }}">
                <div class="hidden xl:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" @mouseover="mostrar_icono = 6" @mouseout="mostrar_icono = null">
                    <p class="tracking-widest">
                        About US
                    </p>
                </div>
            </a>
        </div>
        @endrole

        <!-- Iconos del hover -->
        <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 h-auto w-10/12 mx-auto">
        
            <div x-show="mostrar_icono == 1" class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/5158493.png')}}" alt="Mapita" class="w-14 h-14">
            </div>
            <div x-show="mostrar_icono == 1"></div>
            <div x-show="mostrar_icono == 1"></div>
            <div x-show="mostrar_icono == 1"></div>
            <div x-show="mostrar_icono == 1"></div>
            <div x-show="mostrar_icono == 1"></div>
            
            <div x-show="mostrar_icono == 2"></div>
            <div x-show="mostrar_icono == 2" class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/pirataa.png')}}" alt="Perfil" class="w-14 h-14">
            </div>
            <div x-show="mostrar_icono == 2"></div>
            <div x-show="mostrar_icono == 2"></div>
            <div x-show="mostrar_icono == 2"></div>
            <div x-show="mostrar_icono == 2"></div>
        
            <div x-show="mostrar_icono == 3"></div>
            <div x-show="mostrar_icono == 3"></div>
            <div x-show="mostrar_icono == 3" class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/pergamino.png')}}" alt="Cartel" class="w-14 h-14">
            </div>
            <div x-show="mostrar_icono == 3"></div>
            <div x-show="mostrar_icono == 3"></div>
            <div x-show="mostrar_icono == 3"></div>
        
            <div x-show="mostrar_icono == 4"></div>
            <div x-show="mostrar_icono == 4"></div>
            <div x-show="mostrar_icono == 4"></div>
            <div x-show="mostrar_icono == 4" class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/Perfil.png')}}" alt="Tesoro" class="w-14 h-14">
            </div>
            <div x-show="mostrar_icono == 4"></div>
            <div x-show="mostrar_icono == 4"></div>
        
            <div x-show="mostrar_icono == 5"></div>
            <div x-show="mostrar_icono == 5"></div>
            <div x-show="mostrar_icono == 5"></div>
            <div x-show="mostrar_icono == 5"></div>
            <div x-show="mostrar_icono == 5" class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/botella.png')}}" alt="Botin" class="w-14 h-14">
            </div>
            <div x-show="mostrar_icono == 5"></div>
        
            <div x-show="mostrar_icono == 6"></div>
            <div x-show="mostrar_icono == 6"></div>
            <div x-show="mostrar_icono == 6"></div>
            <div x-show="mostrar_icono == 6"></div>
            <div x-show="mostrar_icono == 6"></div>
            <div x-show="mostrar_icono == 6" class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/gancho.png')}}" alt="Nosotros" class="w-14 h-14">
            </div>
        </div>
    </div>
    
    <!--Menu para celulares-->
    <header class="h-14 bg-red-600 sm:hidden w-full">
        <div x-data="{ isActive: false }" class="relative flex justify-center sm:hidden">
            <div class="w-screen h-14 flex items-center justify-center">
                <div class="w-4/5 text-center">
                    <a href="{{ url('/') }}" class="text-3xl text-gray-200 tracking-wider"> Encuentra tu Tesoro </a>
                </div>
                <div class="inline-flex items-center overflow-hidden rounded-md border-2 border-black bg-amber-950 w-12">
                    <button x-on:click="isActive = !isActive" class="h-full p-2 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-7 font-bold">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="absolute start-10 z-10 mt-2 w-4/6 bg-amber-900 shadow-lg" x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false" x-on:keydown.escape.window="isActive = false">
                <div class="p-2 w-auto">
                    <a href="{{ url('/') }}" class="block rounded-lg px-4 py-2 text-xl trackin-widest text-black"> Inicio </a>
                    
                    @if(auth()->check())
                        <a href="{{ route('profile.show') }}" class="block rounded-lg px-4 py-2 text-xl trackin-widest text-black"> {{ Auth::user()->nombres }} </a>
                    @else
                        <a href="{{ route('login') }}" class="block rounded-lg px-4 py-2 text-xl trackin-wide-st text-black"> Perfil </a>
                    @endif
                    
                    <a href="{{ route('pregunta') }}" class="block rounded-lg px-4 py-2 text-xl trackin-widest text-black"> Crear Cartel </a>
                    <a href="{{ route('operdidos') }}" class="block rounded-lg px-4 py-2 text-xl trackin-widest text-black"> Objetos Perdidos </a>

                    @if(auth()->check())
                        <button wire:click="cerrar_sesion" class="flex w-full items-center rounded-lg px-4 py-2 text-xl trackin-widest text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            Cerrar Sesion
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <script>
        function data(){
            return {
                showDiv: null,
                start(){
                    this.showDiv = false;
                },
                abierto(){
                    this.showDiv = !this.showDiv;
                },
                cerrado(){
                    this.showDiv = false;
                }
            }
        }
    </script>
</div>
