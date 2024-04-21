<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\DefaultDbNameSolutionProvider;

class PostList extends Component
{

    use WithPagination;


    #[Url()]
    public $sort = "desc";
    #[Url()]
    public $search = '';
    #[Url()]
    public $category = '';


    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    #[On('search')]
    public function updatedSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->with('author', 'categories')
            ->when($this->activeCategory, function ($query) {
                $query->withCategory($this->category);
            })
            ->when($this->sort, function ($query) {
                $query->withCount('likes')
                    ->orderBy('likes_count', 'desc');
            })
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('published_at', $this->sort === 'desc' ? 'desc' : 'asc')
            ->paginate(5);
    }

    #[Computed()]
    public function activeCategory()
    {
        if ($this->category === null || $this->category === '') {
            return null;
        }

        return Category::where('slug', $this->category)->first();
    }

    public function resetFilters()
    {
        $this->reset('search', 'category');
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
