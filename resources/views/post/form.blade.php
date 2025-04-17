<section class="content">
    <form wire:submit.prevent='save'>
        <input type="text" wire:model.debounce.500ms="title" name="title" id="title" class='full title'
            placeholder='Title'>

        <div class="input-group-row">
            <input type="text" wire:model.debounce.500ms="tagString" name="tags" id="tags"
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

            <button type='button' wire:click='displayStub' class='btn secondary'>Update Summary</button>
        </div>

        <input id="body" type="hidden" name="body" wire:model.defer="body">

        <div wire:ignore>
            <trix-editor input="body"></trix-editor>
        </div>

        @error('body')
            <div class="error" role="alert" aria-live="polite">{{ $message }}</div>
        @enderror

        @if ($displayStub)
            <div class="modal" id="stubModal">
                STUBMODAL
            </div>
        @endif
    </form>

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
    </script>
</section>
