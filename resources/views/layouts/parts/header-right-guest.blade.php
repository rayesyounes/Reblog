<div class="flex space-x-2">
    <x-nav-link href="{{ route('login') }}" type="button" :active="request()->routeIs('login')">
        {{ __('Login') }}
    </x-nav-link>
    <x-nav-link href="{{ route('register') }}" type="button" :active="request()->routeIs('register')">
        {{ __('Register') }}
    </x-nav-link>
</div>
