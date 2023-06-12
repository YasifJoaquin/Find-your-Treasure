<div>
    <div class="absolute inset-0 z-40 w-screen h-auto flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center mt-6">
            <div class="w-3/5 h-auto m-auto rounded-xl bg-amber-900 flex flex-col justify-center">
                <form wire:submit.prevent="crearCartel" class="col-span-8 h-auto">
    
                    <div class="grid grid-cols-8 h-full text-center">
                        <div class=" invisible"></div>
                        <div class=" invisible"></div>
                        <div class="col-span-4">
                            <div class=" flex justify-between mt-5 items-center bg-red-600 rounded-xl">
                                <img src="{{ asset('src/clavo.png') }}" class="ml-2 w-10 h-10">
                                <h1 class="text-gray-200 text-2xl tracking-widest"> Cartel de Objeto Perdido </h1>
                                <img src="{{ asset('src/clavo.png') }}" class="mr-2 w-10 h-10">
                            </div>
                        </div>
                        <div class=" invisible"></div>
                        <div class=" invisible"></div>
    
                        <div class=" invisible"></div>
                        <div class=" invisible"></div>
                        <div class="col-span-4 flex flex-col items-center my-2">
                            @if (isset($image))
                                    <div class="w-1/2 flex justify-center">
                                        <label class="w-auto h-auto cursor-pointer opacity-90 hover:opacity-100">
                                            <div class="w-32 h-32 mr-2 flex items-center justify-center ml-1">
                                                <input type="file" id="image" wire:model="image" class="hidden">
                                                <img src="{{ $image->temporaryURL() }}" alt="" class="h-full w-full">
                                            </div>
                                        </label>
                                    </div>
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
                        <div class="col-span-4 block text-lg text-gray-700 mb-2 tracking-wider">
                            @error('image')
                            <span class="text-black font-semibold bg-orange-300 rounded-xl py-1 px-2"> {{ $message }} </span>
                            @else
                            Retrato del tesoro
                            @enderror
                        </div>
                        <div class=" invisible"></div>
                        <div class=" invisible"></div>
    
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="pregunta1" class="block text-lg text-gray-700 mb-1 tracking-wider">¿Qué tesoro has perdido, camarada?</label>
                            <input type="text" id="pregunta1" name="objeto" wire:model="objeto" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                            @error('objeto') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-4">
                            <label for="pregunta2" class="block text-lg text-gray-700 mb-1 tracking-wider">¿Cuál es la marca del tesoro, bucanero?</label>
                            <input type="text" id="pregunta2" name="marca" wire:model="marca" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        </div>
    
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="pregunta3" class="block text-lg text-gray-700 mb-1 tracking-wider">¿De que color es el cofre del tesoro?</label>
                            <input type="text" id="pregunta3" name="color" wire:model="color" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                            @error('color') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="pregunta4" class="block text-lg text-gray-700 mb-1 tracking-wider">Explicais más sobre este tesoro, bucanero</label>
                            <input type="text" id="pregunta4" name="descripcion" maxlength="45" wire:model="descripcion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                            @error('descripcion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                        </div>
    
                        <div class="col-span-4 flex flex-col items-center">
                            <label for="pregunta5" class="block text-lg text-gray-700 mb-1 tracking-wider">¿Donde has perdido ese botín, camarada?</label>
                            <input type="text" id="pregunta5" name="ubicacion" wire:model="ubicacion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                            @error('ubicacion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-4">
                            <label for="pregunta6" class="block text-lg text-gray-700 mb-1 tracking-wider">¿Qué tan valioso es tu tesoro, camarada?</label>
                            @livewire('importancia')
                        </div>
    
                        <div class=" invisible"></div>
                        <div class=" invisible"></div>
                        <div class=" invisible"></div>
                        <div class=" col-span-2 flex justify-center items-center">
                            <button type="submit" class="bg-amber-800 hover:bg-blue-900 text-white tracking-widest py-2 px-4 mt-1 mb-2 rounded-full">
                                Crear Cartel
                            </button>
                        </div>
                        <div class="col-span-8"></div>
    
                        {{-- Variable que recibe el controlador del formulario el valor de la importancia
                        <div class=" border-2 border-black"> importancia desde el controlador del formulario: {{ $importanceLevel }}</div> --}}
    
                        <div class=" invisible"></div>
                        <div class=" invisible"></div>
                    
                    </div>
    
                </form>
            </div>
        </div>
        
        
    </div>
</div>