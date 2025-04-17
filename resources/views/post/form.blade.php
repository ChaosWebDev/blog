<section class="content">
    <form wire:submit.prevent='save'>
        <input type="text" wire:model.live.debounce.500ms="title" name="title" id="title" class='full title'
            placeholder='Title'>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="input-group-row">
            <input type="text" wire:model.live.debounce.500ms="tagString" name="tags" id="tags"
                placeholder="Separate tags by ," />
            @error('tags')
                <div id="tag-error" role="alert" aria-live="polite">{{ $message }}</div>
            @enderror

            <input type="file" wire:model="cover_image" name="cover_image" id="cover_image" class='card' />
            @error('cover_image')
                <div id="file-error" role="alert" aria-live="polite">{{ $message }}</div>
            @enderror

            <button type="button" wire:click="publish" class="btn {{ $is_published ? 'primary' : 'secondary' }}">
                {{ $is_published ? 'Unpublish' : 'Publish' }}
            </button>

            <button type='button' wire:click='showStubModal' class='btn secondary'>Update Summary</button>
        </div>

        <input id="body" type="hidden" name="body" wire:model.defer="body">

        <div wire:ignore>
            <trix-editor input="body"></trix-editor>
        </div>

        @error('body')
            <div class="error" role="alert" aria-live="polite">{{ $message }}</div>
        @enderror

        @if ($displayStub)
            <x-modal.post />
        @endif
    </form>

    @if ($post->cover_image)
        <aside class="cover-preview">
            <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Cover Image Preview"
                style="max-height: 150px;">
        </aside>
    @endif

    <script type='module'>
        let debounceTimeout;
        const reset = 2000; // 2 second delay

        document.addEventListener("trix-change", function(event) {
            clearTimeout(debounceTimeout);

            debounceTimeout = setTimeout(() => {
                @this.set('body', event.target.innerHTML);
                console.log('ding');
            }, reset);
        });

        $(() => {
            Livewire.on('slugUpdated', function(data) {
                let title = data[0].slug;
                history.pushState(null,'',`/authd/post/${title}/edit`);
            });
        });
    </script>
</section>
