<x-layout>
    <h1>Login</h1>

    <x-errors />

    <form method="post" action="/login">
        @csrf
        <fieldset>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" id="email" type="email" required autocomplete="email" />
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input name="password" id="password" type="password" required autocomplete="current-password" />
            </div>

            <button type="submit" class="btn-primary">Login</button>
        </fieldset>
    </form>
</x-layout>