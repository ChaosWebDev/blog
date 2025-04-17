<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{
    public Post $post;

    public function render()
    {
        return view('post.edit', [
            'post' => $this->post
        ]);
    }
}
