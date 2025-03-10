<x-layout>
    <x-logo />
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn-primary">New product</a>
    <br><br>

    <div class="container">

        <form method="GET" action="{{ url()->current() }}" class="filters">
            <div class="filter-group">

                <div class="filter">
                    <label for="sort_name">Name:</label>
                    <select name="sort_name" id="sort_name" onchange="this.form.submit()">
                        <option value="">--</option>
                        <option value="name|asc" {{ request('sort_name') === 'name|asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="name|desc" {{ request('sort_name') === 'name|desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </div>

                <div class="filter">
                    <label for="sort_price">Price:</label>
                    <select name="sort_price" id="sort_price" onchange="this.form.submit()">
                        <option value="">--</option>
                        <option value="price|asc" {{ request('sort_price') === 'price|asc' ? 'selected' : '' }}>Low to High</option>
                        <option value="price|desc" {{ request('sort_price') === 'price|desc' ? 'selected' : '' }}>High to Low</option>
                    </select>
                </div>

                <div class="filter">
                    <label for="manufacturer">Manufacturer:</label>
                    <select name="manufacturer" id="manufacturer" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer }}" {{ request('manufacturer') === $manufacturer ? 'selected' : '' }}>
                            {{ $manufacturer }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter">
                    <label for="platform">Platform:</label>
                    <select name="platform" id="platform" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach($platforms as $platform)
                        <option value="{{ $platform }}" {{ request('platform') === $platform ? 'selected' : '' }}>
                            {{ $platform }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter">
                    <label for="connection">Connection:</label>
                    <select name="connection" id="connection" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="wireless" {{ request('connection') === 'wireless' ? 'selected' : '' }}>Wireless</option>
                        <option value="cable" {{ request('connection') === 'cable' ? 'selected' : '' }}>Cable</option>
                    </select>
                </div>

                <div class="filter">
                    <label for="color">Color:</label>
                    <select name="color" id="color" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach($colors as $color)
                        <option value="{{ $color }}" {{ request('color') === $color ? 'selected' : '' }}>
                            {{ $color }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            @foreach(request()->except(['sort_name', 'sort_price', 'manufacturer', 'platform', 'connection', 'color', 'page']) as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
        </form>

        <div class="products-wrapper">
            @if($products->count() > 0)
            <div class="product-grid">
                @foreach ($products as $product)
                <div class="product-card">
                    <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h2>
                    <p>{{ $product->description }}</p>
                    <p><strong>Connection:</strong> {{ ucfirst($product->connection) }}</p>
                    <p class="price">{{ $product->price }}</p>
                </div>
                @endforeach
            </div>
            {{ $products->links('vendor/pagination/simple-default') }}
            @else
            <p class="no-results">No products found matching your criteria.</p>
            @endif
        </div>

        <a href="/logout" class="btn-primary">Logout</a>

    </div>

</x-layout>