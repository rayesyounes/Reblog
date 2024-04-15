<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{

    public Post $post;

    public function like()
    {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if ($user->hasLiked($this->post)) {
            $user->likes()->detach($this->post);
        } else {
            $user->likes()->attach($this->post);
        }

    }

    public function render()
    {

        return view('livewire.like-button');
    }
}
