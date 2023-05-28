@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'focus:border-indigo-500 focus:ring-indigo-500 shadow-sm tracking-widest w-5/6 mx-auto']) !!}>