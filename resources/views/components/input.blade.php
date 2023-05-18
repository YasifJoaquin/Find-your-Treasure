@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' border-2 text-sm border-red-600 focus:border-indigo-500 focus:ring-indigo-500 rounded-full shadow-sm']) !!}>
