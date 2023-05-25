<div>
    <!-- Menu -->
<div class="grid grid-cols-2 text-base max-sm:hidden sm:text-lg sm:grid-cols-4 lg:grid-cols-6 rounded-full bg-red-600 h-auto mt-3 w-10/12 mx-auto">
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
    {{-- <a href="{{ route('mobjetosp') }}">
        <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarBotin" wire:mouseout="OcultarBotin">
            <p class="tracking-widest">
                Mis Perdidos
            </p>
        </div>
    </a>
    <a href="{{ route('mobjetose') }}">
        <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2" id="hijo" wire:mouseover="MostrarNosotros" wire:mouseout="OcultarNosotros">
            <p class="tracking-widest">
                Mis Encontrados
            </p>
        </div>
    </a> --}}
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
</div>
