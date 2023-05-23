<x-app-layout>
    
    <div class="relative">
        @livewire('menu')
    </div>

    <div>
        <div class="mt-6 flex justify-center text-center relative">
            {{-- Fondo carte --}}
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('src/cartel-index.png')}}" alt="Barco" class="w-11/12 h-full object-cover mx-auto" alt=" fondo perfil">
            </div>
            {{-- Grids del perfil --}}
            <div class="w-4/5 h-4/5 grid grid-cols-5 gap-2 z-10">
                {{-- Div principal, titulo --}}
                <div class="col-span-5 rounded-xl w-6/12 h-14 mx-auto bg-red-600 flex justify-center items-center mt-3 border-2 border-black">
                    <div class="w-3/12"> 
                        <img src="{{ asset('src/clavo.png')}}" class="w-16 h-16 object-cover mx-auto" alt="Clavo">
                    </div>
                    <div class="w-6/12"> <p class="text-3xl text-gray-100 tracking-widest"> Mi perfil </p> </div>
                    <div class="w-3/12">
                        <img src="{{ asset('src/clavo.png')}}" class="w-16 h-16 object-cover mx-auto" alt="Clavo">
                    </div>
                </div>
                
                {{-- Div de los datos del usuario --}}
                <div class="col-span-2 row-span-6 bg-red-600 rounded-2xl border-2 border-black">
                    <p class="text-xl text-white tracking-widest">
                        - Se busca -
                    </p> <br>
                    <div class="border w-48 h-40 mx-auto"></div>
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                    @endif
                    
                </div>
                {{-- Div de los Objetos Perdidos --}}
                <div class="col-span-2 row-span-3 bg-red-600 rounded-2xl hover:bg-red-700">
                    <a href="{{ route('mobjetosp') }}" class="top-0 left-0 border-2 rounded-xl w-full h-full flex flex-col items-center border-black">
                        <img src="{{ asset('src/mapa.png')}}" alt="Icono" class="w-20 h-20 mt-10">
                        <div class="absolute z-10 mt-32">
                            <span class="text-white text-2xl tracking-wider"> Mis Objetos Perdidos </span>
                        </div>
                    </a>
                </div>
                
                
                {{-- <div class="border row-span-2 invisible"></div> --}}
                {{-- Boton de deslogueo 2 --}}
                <div class="row-span-2 flex items-center justify-center invisible">
                    {{-- <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                                {{ __('Abandonar la Cubierta') }}
                        </x-dropdown-link>
                    </form> --}}
                </div>

                {{-- Div de mis Agradecimientos --}}
                <div class="row-span-2 bg-red-600 rounded-2xl hover:bg-red-700">
                    <a href="{{ route('magradecimientos') }}" class="top-0 left-0 border-2 rounded-xl w-full h-full flex flex-col items-center border-black">
                        <img src="{{ asset('src/mapa.png')}}" alt="Icono" class="w-20 h-20 mt-10">
                        <div class="absolute z-10 mt-32">
                            <span class="text-white text-2xl tracking-wider"> Mis Agradecimientos </span>
                        </div>
                    </a>
                </div>
                {{-- Div de mis Objetos Encontrados --}}
                <div class="border col-span-2 row-span-3 bg-red-600 rounded-2xl hover:bg-red-700">
                    <a href="{{ route('mobjetose') }}" class="top-0 left-0 border-2 rounded-xl w-full h-full flex flex-col items-center border-black">
                        <img src="{{ asset('src/pala.png')}}" alt="Icono" class="w-20 h-20 mt-10">
                        <div class="absolute z-10 mt-32">
                            <span class="text-white text-2xl tracking-wider"> Mis Objetos Encontrados </span>
                        </div>
                    </a>
                </div>

                {{-- <div class="border row-span-2 invisible"></div> --}}
                {{-- Boton de deslogueo 2 --}}
                <div class="row-span-2 flex items-center justify-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                                {{ __('Abandonar la Cubierta') }}
                        </x-dropdown-link>
                    </form>
                </div>

                <div class="border col-span-5 invisible"></div>
            </div>
        </div>
    </div>

</x-app-layout>