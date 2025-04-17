<?php

namespace App\Livewire\Components;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Menu extends Component
{
    public $posts;
    public $unpublished;
    public bool $authd;

    public function mount()
    {
        $this->posts = Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        $this->unpublished = Post::where('is_published', false)
            ->orderBy('created_at', 'desc')
            ->get();

            $this->authd = Auth::user() ? true : false;
    }

    public function render()
    {
        return view('components.menu');
    }
}
