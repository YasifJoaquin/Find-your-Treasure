<div class="grid grid-cols-3 text-base lg:text-lg sm:grid-cols-4 lg:grid-cols-6 rounded-full bg-red-600 h-auto mt-3 w-10/12 mx-auto z-50">
    <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo">
        <a href="#">
            Inicio
        </a>
    </div>
    <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo">
        @if(auth()->check())
        <a href="#">
            {{ Auth::user()->name }}
        </a>
        @else
        <a href="#">
            Perfil
        </a>
        @endif
    </div>
    <div class="hidden sm:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo">
        <a href="#">
            Crear Cartel
        </a>
    </div>
    <div class="bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo">
        <a href="#">
            Objetos Per...
        </a>
    </div>
    <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo">
        <a href="#">
            Botin
        </a>
    </div>
    <div class="hidden lg:block bg-red-600 rounded-full text-center my-auto h-full br-red-600 hover:bg-blue-900 text-white p-2 font-semibold" id="hijo">
        <a href="#">
            About US
        </a>
    </div>
</div>