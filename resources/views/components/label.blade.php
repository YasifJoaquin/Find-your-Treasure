@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xl text-center text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
