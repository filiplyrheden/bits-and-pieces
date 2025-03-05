<x-layout>

    <h1>New product</h1>

    <x-errors />

    <form method="post" action="{{ route('products.store') }}">
        <x-products.form :consoles="$consoles" />
    </form>

</x-layout>