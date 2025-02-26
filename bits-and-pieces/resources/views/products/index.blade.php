<x-layout>

    <h1>Products</h1>

    <a href="{{ route('products.create') }}">New product</a>

    @foreach ($products as $product)

    <h2><a href="">Product name</a></h2>
    <p>Description</p>

    @endforeach

    {{ $products->links('vendor/pagination/simple-default') }}
</x-layout>