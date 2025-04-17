<nav>
    <x-link :href="route('home')" text="Home" i='nf-cod-home' />

    <x-link :href="route('authd.posts.create')" text="New Post" i="nf-fa-plus" />

    @foreach ($posts as $post)
        <x-link :href="route('posts.show', $post->slug)" text="{{ $post->navDate . ' - ' . $post->title }}" :title="$post->title"/>
    @endforeach
</nav>
