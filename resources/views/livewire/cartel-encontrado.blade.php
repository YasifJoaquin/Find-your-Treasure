<div>
    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50 mb-2">
            @livewire('menu')
        </div>

        <div class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center mt-6">
            <div class="w-3/5 h-auto m-auto rounded-xl flex flex-col justify-center bg-amber-900">
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
                    <div class="col-span-4 flex flex-col items-center my-2">
                        @if (isset($image))
                            @if (in_array($image->guessExtension(), $extensionesPermitidas))
                                <div class="w-1/2 flex justify-center">
                                    <label class="w-auto h-auto cursor-pointer opacity-90 hover:opacity-100">
                                        <div class="w-32 h-32 mr-2 flex items-center justify-center ml-1">
                                            <input type="file" id="image" wire:model="image" class="hidden">
                                            <img src="{{ $image->temporaryURL() }}" alt="" class="h-full w-full">
                                        </div>
                                    </label>
                                </div>
                            @else
                                <label class="w-20 h-20 bg-red-500 flex justify-center items-center cursor-pointer border-4 border-gray-400 rounded-3xl">
                                    <div class=" opacity-50 hover:opacity-100 h-full w-full flex items-center justify-center">
                                        <input type="file" id="image" wire:model="image" class="hidden">
                                        <img src="{{ asset('src/camara-1.png') }}" alt="Icono" class="w-4/6 h-4/6">
                                    </div>
                                </label>
                            @endif
                        @else
                            <label class="w-20 h-20 bg-yellow-500 flex justify-center items-center cursor-pointer border-4 border-gray-400 rounded-3xl">
                                <div class=" opacity-50 hover:opacity-100 h-full w-full flex items-center justify-center">
                                    <input type="file" id="image" wire:model="image" class="hidden">
                                    <img src="{{ asset('src/camara-1.png') }}" alt="Icono" class="w-4/6 h-4/6">
                                </div>
                            </label>
                        @endif
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-4 block text-lg text-gray-700 mb-1 tracking-wider">
                        @error('image')
                        <span class="text-black font-semibold bg-orange-300 rounded-xl py-1 px-2"> {{ $message }} </span>
                        @else
                            @if (isset($image))
                                @if (!in_array($image->guessExtension(), $extensionesPermitidas))
                                    <span class="text-black font-semibold bg-orange-300 rounded-xl py-1 px-2"> Tipo de archivo invalido, solo se aceptan imagenes </span>
                                @endif
                            @endif
                            Retrato del tesoro
                        @enderror
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta1" class="block text-lg text-gray-700 mb-1 tracking-wider">¿Qué tesoro has encontrado, camarada?</label>
                        <input type="text" id="pregunta1" name="objeto" wire:model="objeto" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('objeto') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-4">
                        <label for="pregunta2" class="block text-lg text-gray-700 mb-1 tracking-wider">¿Cuál es la marca del tesoro, bucanero?</label>
                        <input type="text" id="pregunta2" name="marca" wire:model="marca" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        
                    </div>
                
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta3" class="block text-lg text-gray-700 mb-1 tracking-wider">¿De que color es el color del tesoro?</label>
                        <input type="text" id="pregunta3" name="color" wire:model="color" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('color') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta4" class="block text-lg text-gray-700 mb-1 tracking-wider">Explicais más sobre este tesoro, bucanero</label>
                        <input type="text" id="pregunta4" name="descripcion" maxlength="45" wire:model="descripcion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('descripcion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta5" class="block text-lg text-gray-700 mb-1 tracking-wider">¿Donde has encontrado ese botín, camarada?</label>
                        <input type="text" id="pregunta5" name="ubicacion" wire:model="ubicacion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('ubicacion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class=" col-span-2 flex justify-center items-center">
                        <button type="submit" class="bg-amber-800 hover:bg-blue-900 text-white tracking-widest py-2 px-4 my-2 rounded-full">
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
</div>


{{-- <button @click="showModal = false" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded">Cerrar</button> --}}