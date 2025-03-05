<x-layout>

    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>

    <form method="post" action="{{ route('products.edit', $product) }}">
        <button>Edit</button>
    </form>

    <form method="post" action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')

        <button>Delete</button>

    </form>

</x-layout>