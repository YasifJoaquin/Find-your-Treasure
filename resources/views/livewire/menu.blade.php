<div>
    <!-- Menu -->
    <div class="grid grid-cols-3 text-base lg:text-lg sm:grid-cols-4 lg:grid-cols-6 rounded-full bg-red-600 h-auto mt-3 w-10/12 mx-auto">
        <a href="{{ url('/') }}">
            <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo" wire:mouseover="MostrarMapita" wire:mouseout="OcultarMapita">
                Inicio
            </div>
        </a>

        @if(auth()->check())
        <a href="{{ url('/') }}">
            <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo" wire:mouseover="MostrarPerfil" wire:mouseout="OcultarPerfil">
                {{ Auth::user()->name }}
            </div>
        </a>
        @else
        <a href="{{ route('login') }}">
            <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo" wire:mouseover="MostrarPerfil" wire:mouseout="OcultarPerfil">
                Perfil
            </div>
        </a>
        @endif
        
        <a href="#">
            <div class="hidden sm:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo" wire:mouseover="MostrarCartel" wire:mouseout="OcultarCartel">
                Crear Cartel
            </div>
        </a>
        <a href="#">
            <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo" wire:mouseover="MostrarTesoro" wire:mouseout="OcultarTesoro">
                Objetos Per...
            </div>
        </a>
        <a href="#">
            <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo" wire:mouseover="MostrarBotin" wire:mouseout="OcultarBotin">
                Botin
            </div>
        </a>
        <a href="#">
            <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo" wire:mouseover="MostrarNosotros" wire:mouseout="OcultarNosotros">
                About US
            </div>
        </a>
    </div>

    <!-- Iconos del hover -->
    <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 h-auto w-10/12 mx-auto">
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
    </div>
</div>
