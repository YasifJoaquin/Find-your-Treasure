@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xl text-center text-gray-200 my-auto']) }}>
    {{ $value ?? $slot }}
</label>
