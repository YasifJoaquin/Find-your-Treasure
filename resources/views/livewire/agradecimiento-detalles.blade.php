<div>
    <div class="relative border-2 border-red-700 w-screen h-screen z-50">
        <div class="relative h-1/6">
            @livewire('menu')
        </div>
        
        <div class="h-4/5 w-5/6 mx-auto flex justify-center items-center text-center border-2 border-black relative">
            <img src="{{ asset('src/cartel-index.png')}}" alt="Cartel buscar tu tesoro" class="object-cover w-full h-full z-10">
            <div class="border-2 border-black inset-0 absolute z-20 w-4/6 h-5/6 m-auto bg-cover bg-center" style="background-image: url({{ asset('src/fondo-claro.png') }}) ;">
                <h1> - Agradecimiento de {{ $agradecimientos->user->nombres }} - </h1>
                
            </div>
        </div>
    </div>
</div>