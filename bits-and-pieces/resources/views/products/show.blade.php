<x-layout>

    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>

    <a href="{{ route('products.edit', $product) }}">Edit</a>

    <form method="post" action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')

        <button>Delete</button>

    </form>

</x-layout>