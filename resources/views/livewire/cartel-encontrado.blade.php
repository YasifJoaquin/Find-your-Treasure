<div>
    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="w-3/5 h-4/5 m-auto rounded-xl bg-center flex flex-col justify-center" style="background-image: url({{ asset('src/fondo-claro.png') }});">
            <form wire:submit.prevent="crearCartel" class="col-span-8 h-full">

                <div class="grid grid-cols-8 h-full text-center">
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-4">
                        <div class=" flex justify-between mt-5 items-center bg-red-600 rounded-xl">
                            <img src="{{ asset('src/clavo.png') }}" class="ml-2 w-10 h-10">
                            <h1 class="text-gray-200 text-2xl tracking-widest"> Cartel de Objeto Encontrado </h1>
                            <img src="{{ asset('src/clavo.png') }}" class="mr-2 w-10 h-10">
                        </div>
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-4">
                        |     Imagen mas adelante |
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-4 block text-lg text-gray-700 mb-2 tracking-wider"> Retrato del tesoro </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta1" class="block text-lg text-gray-700 mb-2 tracking-wider">¿Qué tesoro has encontrado, camarada?</label>
                        <input type="text" id="pregunta1" name="objeto" wire:model="objeto" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('objeto') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-4">
                        <label for="pregunta2" class="block text-lg text-gray-700 mb-2 tracking-wider">¿Cuál es la marca del tesoro, bucanero?</label>
                        <input type="text" id="pregunta2" name="marca" wire:model="marca" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        
                    </div>
                
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta3" class="block text-lg text-gray-700 mb-2 tracking-wider">¿De que color es el color del tesoro?</label>
                        <input type="text" id="pregunta3" name="color" wire:model="color" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('color') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta4" class="block text-lg text-gray-700 mb-2 tracking-wider">Explicais más sobre este tesoro, bucanero</label>
                        <input type="text" id="pregunta4" name="descripcion" wire:model="descripcion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('descripcion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta5" class="block text-lg text-gray-700 mb-2 tracking-wider">¿Donde has encontrado ese botín, camarada?</label>
                        <input type="text" id="pregunta5" name="ubicacion" wire:model="ubicacion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('ubicacion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class=" col-span-2 flex justify-center items-center">
                        <button type="submit" class="bg-amber-800 hover:bg-amber-900 text-white tracking-widest py-2 px-4 rounded-full">
                            Crear Cartel
                        </button>
                    </div>
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                </div>

            </form>
        </div>
    </div>
</div>


{{-- <button @click="showModal = false" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded">Cerrar</button> --}}