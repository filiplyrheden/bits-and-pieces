<x-layout>
    <h1>Login</h1>

    <x-errors />

    <form method="post" action="/login">
        @csrf
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" />
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit">Login</button>
    </form>
</x-layout>