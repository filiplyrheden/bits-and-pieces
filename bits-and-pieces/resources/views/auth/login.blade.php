<x-layout>
    <h1>Login</h1>

    <x-errors />

    <div class="form-group">
        <form method="post" action="/login">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input name="email" id="email" type="email" />
            </div>
            <div>
                <label for="password">Password:</label>
                <input name="password" id="password" type="password" />
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn-primary">Login</button>
        </form>
    </div>
</x-layout>