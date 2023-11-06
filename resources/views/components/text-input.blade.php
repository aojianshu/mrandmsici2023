@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-600 focus:border-gray-600 focus:ring-gray-600 rounded-md shadow-sm bg-gray-800 text-gray-400']) !!}>
