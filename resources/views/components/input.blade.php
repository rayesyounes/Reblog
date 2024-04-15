@props(['disabled' => false])

<label>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-blue-50 focus:outline-none focus:border-none focus:ring-0 outline-none border-none text-xs text-gray-800 placeholder:text-gray-400']) !!}>
</label>
