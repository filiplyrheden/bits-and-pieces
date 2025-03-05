@csrf

<label for="name">Name</label>
<input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}">

<label for="console_id">Console:</label>
<select name="console_id" required>
    @foreach($consoles as $console)
    <option value="{{ $console->id }}">{{ $console->manufacturer }}</option>
    @endforeach
</select>

<label for="description">Description</label>
<textarea type="text" name="description" id="description" value="{{ old('description', $product->description ?? '') }}"></textarea>

<label for="color">Color</label>
<input type="text" name="color" id="color" value="{{ old('color', $product->color ?? '') }}">

<label for="connection">Connection</label>
<select id="connection" name="connection" value="{{ old('connection', $product->connection ?? '') }}">
    <option value="wireless">Wireless</option>
    <option value="cable">Cable</option>
</select>

<label for="price">Price</label>
<input type="text" name="price" id="price" value="{{ old('price', $product->price ?? '') }}">

<button>Save</button>