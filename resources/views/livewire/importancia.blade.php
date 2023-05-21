<div>
    <div class="flex items-center justify-center space-x-2">
        @for($i = 1; $i <= 5; $i++)
            <img
                src="{{ asset('src/tesoro.png') }}"
                alt="Imagen {{ $i }}"
                class="cursor-pointer w-12 h-12 {{ $i <= $importanceLevel ? 'opacity-100' : 'opacity-50' }}"
                wire:click="setImportanceLevel({{ $i }})"
            >
        @endfor
    </div>

    {{-- variable que guarda el valor de la importancia
    <p class="mt-4">Selected importance level: {{ $importanceLevel }}</p> --}}
</div>

