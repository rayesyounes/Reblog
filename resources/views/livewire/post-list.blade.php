<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="flex items-center space-x-4 font-light">
            <button class="transition-colors duration-300 ease-in-out {{$sort === "popular" ? "text-purple-900 border-b-2 border-purple-900" : "text-gray-500"}} py-2 px-4 hover:text-purple-900 hover:border-b-2 hover:border-purple-900 focus:outline-none" wire:click="setSort('popular')">Popular</button>
            <button class="transition-colors duration-300 ease-in-out {{$sort === "desc" ? "text-purple-900 border-b-2 border-purple-900" : "text-gray-500"}} py-2 px-4 hover:text-purple-900 hover:border-b-2 hover:border-purple-900 focus:outline-none" wire:click="setSort('desc')">Latest</button>
            <button class="transition-colors duration-300 ease-in-out {{$sort === "asc" ? "text-purple-900 border-b-2 border-purple-900" : "text-gray-500"}} py-2 px-4 hover:text-purple-900 hover:border-b-2 hover:border-purple-900 focus:outline-none" wire:click="setSort('asc')">Oldest</button>
        </div>


        <div class="flex items-center gap-2">
            @if ($search)
                <span class="font-bold text-purple-500">Searching for:</span> "{{ $search }}"
                <span class="text-purple-500">({{ $this->posts->total() }} {{ Str::plural('post', $this->posts->total()) }} found)</span>
            @endif
            @if($this->activeCategory)
                    <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->slug]) }}"
                             bg_color="{{ $this->activeCategory->bg_color }}"
                             text_color="{{ $this->activeCategory->text_color }}"
                    >
                        {{ $this->activeCategory->title }}
                    </x-badge>
            @endif
            @if($this->activeCategory || $search)
                <button class="text-gray-600" wire:click="resetFilters">
                    <img
                        class="w-6 h-6"
                        src="{{ asset('icons/x.svg') }}" alt="close">
                </button>
            @endif
        </div>


    </div>
    <div class="py-4">
        @foreach($this->posts as $post)
            <x-posts.post-item :post="$post"/>
        @endforeach
    </div>
    <div class="my-3">
        {{$this->posts->onEachSide(1)->links()}}
    </div>
</div>
