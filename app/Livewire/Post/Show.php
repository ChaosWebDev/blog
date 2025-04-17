<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public ?Post $post;

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('post.show');
    }
}
