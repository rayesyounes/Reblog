@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ isset($title) ? $title . ' | ' : "" }} {{ config('app.name', 'REBLOG') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-light antialiased">



{{--@include('layouts.parts.header')--}}

<main class=" w-full px-5 flex flex-grow bg-purple-600">
    {{$slot}}
</main>

{{--@include('layouts.parts.footer')--}}

</body>

@stack('modals')
@livewireScripts

</html>
