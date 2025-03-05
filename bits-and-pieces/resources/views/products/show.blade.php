<x-layout>

    <h1>{{ $product->name }}</h1>
    <p>{{ $product->desciption }}</p>

    <a href="{{ 'products.edit', $product->id }}">Edit</a>

    <form method="post" action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')

        <button>Delete</button>

    </form>

</x-layout>