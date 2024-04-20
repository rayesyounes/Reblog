<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PostComments extends Component
{
    use withPagination;

    public Post $post;

    #[Rule('required|string|max:255')]
    public string $comment = '';

    public function postComment()
    {

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate();

        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id(),
        ]);

        $this->comment = '';
    }

    public function deleteComment($commentId)
    {
        $comment = $this->post->comments()->find($commentId);

        if ($comment) {
            $comment->delete();
        }
    }

    public function editComment($commentId)
    {
        $comment = $this->post->comments()->find($commentId);

        if ($comment) {
            $this->comment = $comment->comment;
            $comment->delete();
        }
    }

    #[Computed()]
    public function comments()
    {
        return $this->post?->comments()->latest()->paginate(5);
    }

    public function render()
    {
        return view('livewire.post-comments');
    }
}
