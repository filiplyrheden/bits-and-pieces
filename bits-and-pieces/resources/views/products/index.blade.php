<x-layout>

    <h1>Products</h1>

    <a href="{{ route('products.create') }}">New product</a>

    <br> <br>

    <div>
        <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => 'asc']) }}">Sort by Name (A-Z)</a> |
        <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => 'desc']) }}">Sort by Name (Z-A)</a> |
        <a href="{{ request()->fullUrlWithQuery(['sort' => 'price', 'direction' => 'asc']) }}">Sort by Price (Low to High)</a> |
        <a href="{{ request()->fullUrlWithQuery(['sort' => 'price', 'direction' => 'desc']) }}">Sort by Price (High to Low)</a>
    </div>

    @foreach ($products as $product)

    <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h2>
    <p>{{ $product->description }}</p>

    @endforeach

    {{ $products->links('vendor/pagination/simple-default') }}
</x-layout>