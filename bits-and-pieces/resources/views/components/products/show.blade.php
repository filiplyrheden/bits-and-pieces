<article>
    <h1>{{ $product->name }}</h1>
    <p><strong>Platform:</strong> {{ $product->console->platform }}</p>
    <p>{{ $product->description }}</p>
    <p><strong>Color:</strong> {{ $product->color }}</p>
    <p><strong>Connection:</strong> {{ ucfirst($product->connection) }}</p>
    <p><strong>Price:</strong> {{ number_format($product->price, 0) }} kr</p>

    <div class="actions">
        <a href="{{ route('products.edit', $product) }}" class="btn-primary">Edit</a>

        @if(auth()->user() && auth()->user()->isAdmin())
        <form method="post" action="{{ route('products.destroy', $product) }}">
            @csrf
            @method('DELETE')
            <button class="btn-delete">Delete</button>
        </form>
        @endif
    </div>

</article>