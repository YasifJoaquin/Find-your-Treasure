<div>
    <div class="relative">
        @livewire('menu')
    </div>

        <div class="mt-14 flex justify-center items-center text-center relative">
            <div class="top-0 left-0 w-5/6 bg-amber-950 h-96 flex justify-center flex-col z-30" name="a">
                @if ($notificaciones->count() === 0)
                <h1 class="text-5xl tracking-widest">
                    Sin notificaciones recientes
                </h1>
                @else
                <div class="bg-white shadow overflow-hidden sm:rounded-lg w-5/6 mt-10 mb-5 mx-auto z-40">
                    <table class="min-w-full divide-y divide-red-600">
                        <thead class="bg-red-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-lg text-black font-medium uppercase tracking-wider">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-lg text-black font-medium uppercase tracking-wider">
                                    Objeto Publicado
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-lg text-black font-medium uppercase tracking-wider">
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-lg text-black font-medium uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($notificaciones as $datos)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $datos->data['user_id'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $datos->data['objeto'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $datos->data['descripcion'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <button wire:click="aceptar_noti('{{ $datos->id }}','{{ $datos->data['id'] }}')" class="mr-8">
                                        {{-- <button wire:click="aceptar_noti('{{ $notificaciones->id }}', '{{ $notificaciones->data['id'] }}')" class="mr-8"> --}}
                                            <img src="{{ asset('src/cheque.png') }}" class="w-8 h-8">
                                        </button>

                                        <button wire:click="rechazar_noti('{{ $datos->id }}','{{ $datos->data['id'] }}')">
                                            <img src="{{ asset('src/muerte.png') }}" class="w-8 h-8">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-span-9 mx-auto mt-3">
                    {{ $notificaciones->links() }}
                </div>
                @endif

            </div>
        </div>
</div>