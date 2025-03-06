<div>
    <h1>{{ $product->name }}</h1>
    <p>Platform: {{ $product->console->platform }}</p>
    <p>{{ $product->description }}</p>
    <p>Color: {{ $product->color }}</p>
    <p>Connection: {{ $product->connection }}</p>
    <p>Price: {{ $product->price }}</p>

    <br> <br>

    <a href="{{ route('products.edit', $product) }}">Edit</a>

    <br> <br>

    <form method="post" action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
</div>