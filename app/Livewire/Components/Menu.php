<?php

namespace App\Livewire\Components;

use App\Models\Post;
use Livewire\Component;

class Menu extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('components.menu');
    }
}
