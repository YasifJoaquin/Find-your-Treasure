<div>
    <div class="relative border w-screen h-screen z-50">
        <div class="relative h-1/6">
            @livewire('menu')
        </div>
        
        <div class="h-4/5 w-5/6 mx-auto flex justify-center items-center text-center relative">
            <img src="{{ asset('src/cartel-index.png')}}" alt="Cartel buscar tu tesoro" class="object-cover w-full h-full z-10">
            <div class="inset-0 absolute z-20 w-4/6 h-5/6 m-auto bg-cover bg-center px-10 py-3" style="background-image: url({{ asset('src/fondo-claro.png') }}) ;">
                <h1 class="text-3xl tracking-wider mt-5"> - Agradecimiento - </h1>
                <h2 class="text-2xl tracking-wide text-left mt-5"> Querido capitan: <br> <span class="ml-3"> {{ Auth::user()->nombres }} </span> </h2>
                <p class="text-xl tracking-widest text-justify px-10 mt-5">
                    {{ $agradecimientos->texto }}
                </p>
                <h3 class="absolute bottom-0 right-10 mb-4 mr-4" name="remitente">
                    Atte: {{ $agradecimientos->user->nombres }}
                </h3>
            </div>
        </div>
    </div>
</div>