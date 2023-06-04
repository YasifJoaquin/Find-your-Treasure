<div>
    <!-- Menu -->
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
        
        {{-- <a href="{{ route('magradecimientos') }}"> --}}
        <a href="#eventos">
            <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2">
                <p class="tracking-widest mt-1 text-xl">
                    Eventos
                </p>
            </div>
        </a>
        {{-- <a href="{{ route('nosotros') }}"> --}}
            

            <div x-data="data()" x-cloak x-init="start()">
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
            
            
    </div>
    @else
    <div class="grid grid-cols-2 text-base max-sm:hidden sm:text-lg sm:grid-cols-3 lg:grid-cols-6 rounded-full bg-red-600 h-auto mt-3 w-10/12 mx-auto">
        <a href="{{ url('/') }}">
            <div class="hidden sm:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarMapita" wire:mouseout="OcultarMapita">
                <p class="tracking-widest">
                    Inicio
                </p>
            </div>
        </a>

        @if(auth()->check())
        <a href="{{ route('profile.show') }}">
            <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarPerfil" wire:mouseout="OcultarPerfil">
                <p class="tracking-widest">
                    {{ Auth::user()->nombres }}
                </p>
            </div>
        </a>
        @else
        <a href="{{ route('login') }}">
            <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarPerfil" wire:mouseout="OcultarPerfil">
                <p class="tracking-widest">
                    Perfil
                </p>
            </div>
        </a>
        @endif
        
        <a href="{{ route('pregunta') }}">
            <div class="hidden sm:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarCartel" wire:mouseout="OcultarCartel">
                <p class="tracking-widest">
                    Crear Cartel
                </p>
            </div>
        </a>
        <a href="{{ route('operdidos') }}">
            <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarTesoro" wire:mouseout="OcultarTesoro">
                <p class="tracking-widest">
                    Objetos Perdidos
                </p>
            </div>
        </a>
        <a href="{{ route('magradecimientos') }}">
            <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarNosotros" wire:mouseout="OcultarNosotros">
                <p class="tracking-widest">
                    Mis Agradecimientos
                </p>
            </div>
        </a>
        <a href="{{ route('nosotros') }}">
            <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarNosotros" wire:mouseout="OcultarNosotros">
                <p class="tracking-widest">
                    About US
                </p>
            </div>
        </a>
    </div>
    @endrole

    <!-- Iconos del hover -->
    
    {{-- <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 h-auto w-10/12 mx-auto">
        @if ($mapita == True)
            <div class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/5158493.png')}}" alt="Mapita" class="w-14 h-14">
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        @elseif($perfil == True)
            <div></div>
            <div class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/vispera-de-todos-los-santos.png')}}" alt="Perfil" class="w-14 h-14">
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        @elseif($cartel == True)
            <div></div>
            <div></div>
            <div class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/pergamino.png')}}" alt="Cartel" class="w-14 h-14">
            </div>
            <div></div>
            <div></div>
            <div></div>
        @elseif($tesoro == True)
            <div></div>
            <div></div>
            <div></div>
            <div class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/Perfil.png')}}" alt="Tesoro" class="w-14 h-14">
            </div>
            <div></div>
            <div></div>
        @elseif($botin == True)
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/botella.png')}}" alt="Botin" class="w-14 h-14">
            </div>
            <div></div>
        @elseif($nosotros == True)
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div class="rounded-full my-auto h-full p-1 flex items-center justify-center" id="hijo">
                <img src="{{ asset('src/gancho.png')}}" alt="Nosotros" class="w-14 h-14">
            </div>
        @endif
    </div> --}}

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
