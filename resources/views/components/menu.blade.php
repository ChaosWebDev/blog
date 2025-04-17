<nav>
    <x-link :href="route('home')" text="Home" i='nf-cod-home' />

    <x-link :href="route('authd.posts.create')" text="New Post" i="nf-fa-plus" />

    @if ($authd)
        <span>-------Unpublished-------</span>
        @foreach ($unpublished as $post)
            <x-link :href="route('authd.posts.edit', $post->slug)" text="{{ $post->navDate . ' - ' . $post->title }}" :title="$post->title" />
        @endforeach
        <span>-----------------------------</span>
    @endif

    @foreach ($posts as $post)
        <x-link :href="route('posts.show', $post->slug)" text="{{ $post->navDate . ' - ' . $post->title }}" :title="$post->title" />
    @endforeach
</nav>
