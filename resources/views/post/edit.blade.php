<main id="post-edit">
    <x-header text="Edit: {{ $post->title }}" />
    @livewire('post.form', ['post' => $post])
</main>
