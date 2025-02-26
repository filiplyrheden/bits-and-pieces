@csrf

<label for="name">Name</label>
<input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}">

<label for="description">Description</label>
<textarea type="text" name="description" id="description" value="{{ old('description', $product->description ?? '') }}"></textarea>

<label for="console">Console</label>
<input type="text" name="console" id="console" value="{{ old('console', $product->console ?? '') }}">

<label for="color">Color</label>
<input type="text" name="color" id="color" value="{{ old('color', $product->color ?? '') }}">

<label for="connection">Connection</label>
<select id="connection" name="connection">
    <option value="wireless">Wireless</option>
    <option value="wired">Wired</option>
</select>
<input type="submit" name="connection" id="connection" value="{{ old('connection', $product->connection ?? '') }}">

<label for="price">Price</label>
<input type="text" name="price" id="price" value="{{ old('price', $product->price ?? '') }}">

<button>Save</button>