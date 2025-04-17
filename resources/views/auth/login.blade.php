<main id="login">
    <form wire:submit.prevent='login' class='cs sh'>
        <fieldset>
            <x-input name='username' label="Username" />
            <x-input name='password' type='password' label="Password" />

            <div class="buttons">
                <input type="submit" value="Login" class='btn primary'>
            </div>
        </fieldset>
    </form>
</main>
