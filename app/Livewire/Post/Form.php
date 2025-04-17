<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class Form extends Component
{
    public ?Post $post;

    public string $title = '';
    public string $stub = '';
    public string $body = '';
    public array $tags = [];
    public ?string $cover_image = null;
    public bool $is_published = false;

    protected $rules = [
        'title' => ['required', 'string', 'max:255'],
        'stub' => ['required', 'string', 'max:255'],
        'body' => ['required', 'string', '']
    ];

    public function save()
    {
        $this->validate();

        $this->post->fill([
            'slug' => Str::slug($this->title),
            'title' => $this->title,
            'stub' => $this->stub,
            'body' => $this->body,
            'tags' => $this->tags,
            'cover_image' => $this->cover_image,
            'reading_time' => ceil(str_word_count($this->body) / 200),
            'is_published' => $this->is_published,
        ]);

        $this->post->save();

        return redirect()->route('authd.posts.index');
    }

    public function render()
    {
        return view('post.form');
    }
}
