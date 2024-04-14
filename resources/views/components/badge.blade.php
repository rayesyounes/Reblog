@props(['bg_color', 'text_color'])

@php
    $textColor = match($text_color) {
    'white' => 'text-white',
    'black' => 'text-black',
    'gray' => 'text-gray-800',
    'purple' => 'text-purple-600',
    'green' => 'text-green-600',
    'red' => 'text-red-600',
    'blue' => 'text-blue-600',
    'yellow' => 'text-yellow-600',
    'indigo' => 'text-indigo-600',
    'pink' => 'text-pink-600',
    'teal' => 'text-teal-600',
    'orange' => 'text-orange-600',
    'cyan' => 'text-cyan-600',
    'amber' => 'text-amber-600',
    'lime' => 'text-lime-600',
    'emerald' => 'text-emerald-600',
    'rose' => 'text-rose-600',
    'fuchsia' => 'text-fuchsia-600',
    'violet' => 'text-violet-600',
    'light-blue' => 'text-light-blue-600',
    'warm-gray' => 'text-warm-gray-600',
    'true-gray' => 'text-true-gray-600',
    'cool-gray' => 'text-cool-gray-600',
    'blue-gray' => 'text-blue-gray-600',
    default => 'text-white',
    };

    $bgColor = match($bg_color) {
    'white' => 'bg-white',
    'black' => 'bg-black',
    'gray' => 'bg-gray-800',
    'purple' => 'bg-purple-400',
    'green' => 'bg-green-600',
    'red' => 'bg-red-500',
    'blue' => 'bg-blue-600',
    'yellow' => 'bg-yellow-400',
    'indigo' => 'bg-indigo-600',
    'pink' => 'bg-pink-400',
    'teal' => 'bg-teal-600',
    'orange' => 'bg-orange-600',
    'cyan' => 'bg-cyan-600',
    'amber' => 'bg-amber-600',
    'lime' => 'bg-lime-600',
    'emerald' => 'bg-emerald-600',
    'rose' => 'bg-rose-600',
    'fuchsia' => 'bg-fuchsia-600',
    'violet' => 'bg-violet-600',
    'light-blue' => 'bg-light-blue-600',
    'warm-gray' => 'bg-warm-gray-600',
    'true-gray' => 'bg-true-gray-600',
    'cool-gray' => 'bg-cool-gray-600',
    'blue-gray' => 'bg-blue-gray-600',
    default => 'bg-white',
    };
@endphp

<button {{ $attributes }}
   class=" {{$bgColor}} {{$textColor}} rounded-xl px-3 py-0.5 bold mr-2 ">
    {{ $slot }}
</button>
