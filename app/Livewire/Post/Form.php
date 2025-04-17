<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Form extends Component
{
    use WithFileUploads;

    public ?Post $post;

    public string $title = '';
    public string $stub = '';
    public string $body = '';
    public array $tags = [];
    public string $tagString = '';
    public string $slug = '';
    public ?string $cover_image = null;
    public bool $is_published = false;
    public ?string $published_at = null;
    public bool $displayStub = false;


    public function mount(?Post $post)
    {
        $this->post = $post ?? new Post();

        $this->is_published = (bool) $this->post->is_published;
        $this->cover_image = $this->post->cover_image ?? null;
        $this->tags = $this->post->tags ?? [];
        $this->body = $this->post->body ?? '';
        $this->stub = $this->post->stub ?? '';
        $this->title = $this->post->title ?? '';
        $this->slug = $this->post->slug ?? '';
        $this->published_at = $this->post->published_at ?? null;

        $this->tagString = implode(', ', $this->tags);
    }

    public function publish()
    {
        $this->is_published = !$this->is_published;
        $this->post->is_published = $this->is_published;
        $this->published_at = $this->is_published ? now() : null;
        $this->post->published_at = $this->published_at;

        $this->post->save();
    }

    public function updatedTitle($value)
    {
        $this->post->title = $value;
        $this->post->slug = Str::slug($value);
        $this->post->save();

        $this->slug = $this->post->slug;

        $this->dispatch('slugUpdated', ['slug' => $this->slug]);
    }

    public function updatedTagString($value)
    {
        $this->tags = array_map('trim', explode(',', $value));
        $this->post->tags = $this->tags;
        $this->post->save();
    }

    public function updatedCoverImage($file)
    {
        $path = $file->storeAs(
            $this->slug,
            'cover.' . $file->getClientOriginalExtension(),
            'public'
        );

        $this->cover_image = $path;
        $this->post->cover_image = $path;
        $this->post->save();
    }


    public function updateStub()
    {
        $this->post->stub = $this->stub;
        $this->post->save();

        $this->displayStub = false;
    }

    public function updatedBody($value)
    {
        $this->post->body = $value;
        $this->post->save();
    }

    public function showStubModal()
    {
        $this->displayStub = true;
    }

    public function render()
    {
        return view('post.form');
    }
}
