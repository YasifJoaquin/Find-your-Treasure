<div>    
    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="w-3/5 h-auto m-auto rounded-xl flex flex-col justify-center bg-amber-900">
            <form wire:submit.prevent="updateObjeto" class="col-span-8 h-full">

                <div class="grid grid-cols-8 h-full text-center">
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-4">
                        <div class=" flex justify-between mt-5 items-center bg-red-600 rounded-xl">
                            <img src="{{ asset('src/clavo.png') }}" class="ml-2 w-10 h-10">
                            <h1 class="text-gray-200 text-2xl tracking-widest"> Datos del Objeto </h1>
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
                    <div class="w-1/2">
                        <label class="w-full h-auto cursor-pointer opacity-90 hover:opacity-100">
                            <div class=" opacity-70 hover:opacity-100 h-full w-full flex items-center justify-center">
                                <input type="file" id="image" wire:model="image" class="hidden">
                                <img src="{{ asset('storage/imagenes/' . $imagen) }}" alt="" class="h-4/6 w-3/6">
                            </div>
                        </label>
                    </div>
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
                        Cambiar el Retrato del tesoro
                        @enderror
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta1" class="block text-lg text-gray-700 mb-2 tracking-wider">¿Qué tesoro has perdido, camarada?</label>
                        <input type="text" id="pregunta1" name="objeto" wire:model="objeto" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('objeto') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta2" class="block text-lg text-gray-700 mb-2 tracking-wider">¿Cuál es la marca del tesoro, bucanero?</label>
                        <input type="text" id="pregunta2" name="marca" wire:model="marca" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('marca') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta3" class="block text-lg text-gray-700 mb-2 tracking-wider">¿De que color es el cofre del tesoro?</label>
                        <input type="text" id="pregunta3" name="color" wire:model="color" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('color') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta4" class="block text-lg text-gray-700 mb-2 tracking-wider">Explicais más sobre este tesoro, bucanero</label>
                        <input type="text" id="pregunta4" name="descripcion" wire:model="descripcion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('descripcion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                
                    @if ($estado == "Perdido")
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta5" class="block text-lg text-gray-700 mb-2 tracking-wider">¿Donde has perdido ese botín, camarada?</label>
                        <input type="text" id="pregunta5" name="ubicacion" wire:model="ubicacion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('ubicacion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-4">
                        <label for="pregunta6" class="block text-lg text-gray-700 mb-2 tracking-wider">¿Qué tan valioso es tu tesoro, camarada?</label>
                        @livewire('importancia')
                    </div>
                    @else
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class="col-span-4 flex flex-col items-center">
                        <label for="pregunta5" class="block text-lg text-gray-700 mb-2 tracking-wider">¿Donde has encontrado ese botín, camarada?</label>
                        <input type="text" id="pregunta5" name="ubicacion" wire:model="ubicacion" class="border-2 focus:bg-gray-200 border-amber-900 bg-gray-300 hover:bg-gray-200 rounded-full w-4/6 text-base">
                        @error('ubicacion') <span class="mt-1 error text-black font-semibold bg-orange-300 rounded-xl py-1 px-2">{{ $message }}</span> @enderror
                    </div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    @endif
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                    <div class=" col-span-2 flex justify-center items-center my-3">
                        <button type="submit" class="bg-amber-800 hover:bg-amber-900 text-white tracking-widest py-2 px-4 rounded-full">
                            Editar Objeto
                        </button>
                    </div>
                
                    {{-- Variable que recibe el controlador del formulario el valor de la importancia
                    <div class=" border-2 border-black"> importancia desde el controlador del formulario: {{ $importanceLevel }}</div> --}}
                
                    <div class=" invisible"></div>
                    <div class=" invisible"></div>
                
                </div>

            </form>
        </div>
    </div>
</div>