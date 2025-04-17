<main id="login">
    <form wire:submit.prevent='login' class='cs sh'>
        <fieldset>
            <x-input name='username' />
            <x-input name='password' type='password' />
        </fieldset>
    </form>
</main>
