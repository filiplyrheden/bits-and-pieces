<form class="form-container" method="POST">
    @csrf
    <fieldset>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}">
        </div>

        <div class="form-group">
            <label for="console_id">Console:</label>
            <select name="console_id" id="console_id" required>
                @foreach($consoles as $console)
                <option value="{{ $console->id }}"
                    {{ old('console_id', $product->console_id ?? '') == $console->id ? 'selected' : '' }}>
                    {{ $console->manufacturer }} - {{ $console->platform }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" value="{{ old('color', $product->color ?? '') }}">
        </div>

        <div class="form-group">
            <label for="connection">Connection:</label>
            <select id="connection" name="connection">
                <option value="wireless" {{ old('connection', $product->connection ?? '') === 'wireless' ? 'selected' : '' }}>Wireless</option>
                <option value="cable" {{ old('connection', $product->connection ?? '') === 'cable' ? 'selected' : '' }}>Cable</option>
            </select>
        </div>

        @if(auth()->user() && auth()->user()->isAdmin())
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? '') }}">
        </div>
        @endif

    </fieldset>

    <button class="btn-primary">Save</button>
</form>