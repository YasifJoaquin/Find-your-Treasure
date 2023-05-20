<div>
    <a href="{{ route('pruebas') }}" class="bg-red-600 border-2 border-black hover:bg-indigo-900 text-white py-2 px-24 mt-2 rounded-full mr-2 text-xl" wire:mouseover="MostrarPerdidos" wire:mouseout="OcultarPerdidos">Encuentralo Aquí</a>

    @if ($perdidos == True)
        <div class="rounded-full my-auto h-full p-2 flex items-center justify-center" id="hijo">
            <img src="{{ asset('src/mapa-del-tesoro.png')}}" alt="Encuentralo" class="w-32 h-28">
        </div>
    @endif

</div>
