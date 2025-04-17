<main id="login">
    <form wire:submit.prevent='login' class='cs sh'>
        <fieldset>
            <x-input name='username' label="Username" />
            <x-input name='password' type='password' label="Password" />

            <div class="flex-row justify-center gap-md col-2">
                <x-input name='remember' type='checkbox' label="Remember Me" />
            </div>

            <div class="buttons">
                <input type="submit" value="Login" class='btn primary'>
            </div>
        </fieldset>
    </form>
</main>
