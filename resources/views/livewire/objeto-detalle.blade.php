<div>
    <div class="relative">
        @livewire('menu')
    </div>
    
    <div>
        <div class="mt-6 flex justify-center items-center text-center relative">
            {{-- Fondo carte --}}
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('src/cartel-index.png')}}" alt="Barco" class="w-11/12 h-full object-cover mx-auto" alt="fondo perfil">
            </div>
            <div class="relative top-0 left-0 w-full h-96 flex justify-center items-center border-2" name="a">
                <!-- Contenido del div con la propiedad "name=a" -->
                <p class="hover:text-2xl">
                    <ul>
                        @foreach ($detalles as $objeto)
                        <li> {{ $objeto->id }}</li>
                        
                        @endforeach
                    </ul>
                </p>
            </div>
        </div>
    </div>
    
</div>
