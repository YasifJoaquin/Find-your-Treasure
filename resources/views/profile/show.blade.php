<x-app-layout>
    
    <div class="relative">
        @livewire('menu')
    </div>

    <div>
        <div class="mt-20 flex justify-center text-center relative">
            {{-- Fondo carte --}}
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('src/cartel-index.png')}}" alt="Barco" class="w-11/12 h-full object-cover mx-auto" alt=" fondo perfil">
            </div>
            {{-- Grids del perfil --}}
            <div class="w-4/5 h-4/5 grid grid-cols-5 gap-2 z-10">
                {{-- Div principal, titulo --}}
                <div class="col-span-5 rounded-xl w-6/12 h-14 mx-auto bg-red-600 flex justify-center items-center mt-3">
                    <div class="w-3/12"> 
                        <img src="{{ asset('src/clavo.png')}}" class="w-16 h-full object-cover mx-auto" alt="Clavo">
                    </div>
                    <div class="w-6/12"> <p class="text-3xl text-gray-100 tracking-widest"> Mi perfil </p> </div>
                    <div class="w-3/12">
                        <img src="{{ asset('src/clavo.png')}}" class="w-16 h-full object-cover mx-auto" alt="Clavo">
                    </div>
                </div>
                {{-- Div de los datos del usuario --}}
                <div class="border col-span-2 row-span-6 bg-red-600 rounded-2xl">
                    <p class="text-xl text-white tracking-widest">
                        - Se busca -
                    </p> <br>
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                    @endif

                    
                </div>
                {{-- Div de los Objetos Perdidos --}}
                <div class="border col-span-2 row-span-3">a</div>
                <div class="border row-span-2 invisible"></div>
                {{-- Div de los Objetos Encontrados --}}
                <div class="border row-span-2">c</div>
                {{-- Div de mis agradecimientos --}}
                <div class="border col-span-2 row-span-3">d</div>
                <div class="border row-span-2 invisible"></div>
                <div class="border col-span-5 invisible"></div>
            </div>
        </div>
    </div>

</x-app-layout>