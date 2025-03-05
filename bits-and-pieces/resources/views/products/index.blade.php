<x-layout>

    <h1>Products</h1>

    <a href="{{ route('products.create') }}">New product</a>

    <br><br>

    <form method="GET" action="{{ url()->current() }}">
        <label for="sort">Sort by:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="">-- Select sorting --</option>
            <option value="name|asc" {{ request('sort') === 'name' && request('direction') === 'asc' ? 'selected' : '' }}>Name (A-Z)</option>
            <option value="name|desc" {{ request('sort') === 'name' && request('direction') === 'desc' ? 'selected' : '' }}>Name (Z-A)</option>
            <option value="connection|asc" {{ request('sort') === 'connection' && request('direction') === 'asc' ? 'selected' : '' }}>Connection</option>
            <option value="price|asc" {{ request('sort') === 'price' && request('direction') === 'asc' ? 'selected' : '' }}>Price (Low to High)</option>
            <option value="price|desc" {{ request('sort') === 'price' && request('direction') === 'desc' ? 'selected' : '' }}>Price (High to Low)</option>
        </select>

        <!-- Keep any other query parameters like search filters or pagination -->
        @foreach(request()->except(['sort', 'direction', 'page']) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

    </form>

    @foreach ($products as $product)

    <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h2>
    <p>{{ $product->description }}</p>

    @endforeach

    {{ $products->links('vendor/pagination/simple-default') }}

</x-layout>