@props(['post'])
<div>
    <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->getThumbnail() }}" alt="{{ $post->image }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            <div>
                @foreach($post->categories as $category)
                    @if ( $category = $post->categories->first() )
                        <x-posts.category-badge :category="$category"/>
                    @endif
                @endforeach
            </div>
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <a wire:navigate href="{{ route('posts.show', $post->slug) }}"
           class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
</div>
