<main id="login">
    <form wire:submit.prevent='login' class='cs sh'>
        <fieldset>
            <x-input name='username' label="Username" />
            <x-input name='password' type='password' label="Password" />
        </fieldset>
    </form>
</main>
