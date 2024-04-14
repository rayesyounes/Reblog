@props(['post'])
<div>
    <a href="#">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->getThumbnail() }}" alt="{{ $post->image }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            <div>
                @foreach($post->categories as $category)
                    <x-badge
                        wire:navigate href="{{ route('posts.index', ['category' => $category->slug]) }}"
                        bg_color="{{ $category->bg_color }}"
                        text_color="{{ $category->text_color }}"
                    >{{ $category->title }}</x-badge>
                @endforeach
            </div>
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <a class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
</div>
