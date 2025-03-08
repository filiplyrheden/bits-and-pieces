<div>
    <h1>{{ $product->name }}</h1>
    <p><b>Platform:</b> {{ $product->console->platform }}</p>
    <p>{{ $product->description }}</p>
    <p><b>Color:</b> {{ $product->color }}</p>
    <p><b>Connection:</b> {{ $product->connection }}</p>
    <p><b>Price:</b> {{ $product->price }}</p>

    <br> <br>

    <a href="{{ route('products.edit', $product) }}" class="btn-primary">Edit</a>

    <br> <br>

    @if(auth()->user() && auth()->user()->isAdmin())
    <form method="post" action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')
        <button class="btn-delete">Delete</button>
    </form>
    @endif

</div>