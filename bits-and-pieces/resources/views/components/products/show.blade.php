<div class="product-page-container">
    <article class="product-page">
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

        <div class="back-button">
            <a href="{{ route('products.index') }}"><svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" stroke="black" stroke-width="2" fill="none" />
                    <path d="M14 7L9 12L14 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg></a>
            <span>Back</span>

        </div>


    </article>
</div>