@props(['active','type' => 'link'])

@php
    $classes = ($active ?? false)
               ? 'inline-flex items-center text-sm bg-purple-500 text-white px-3 py-1 rounded-full transition-colors duration-300 ease-in-out font-bold'
               : 'inline-flex items-center hover:text-purple-500 text-md text-gray-500 px-3 py-1 rounded-md transition-colors duration-300 ease-in-out font-bold';

       if ($type === 'button') {
           $classes = 'inline-flex items-center text-md hover:bg-purple-700 bg-purple-500 text-white px-3 py-1 rounded-md transition-colors duration-300 ease-in-out font-bold';
       }
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
