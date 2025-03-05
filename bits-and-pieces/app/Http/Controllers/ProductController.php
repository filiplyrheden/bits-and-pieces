<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Models\Console;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allowedSorts = ['name', 'price', 'created_at']; // Columns allowed to be sorted by
        $sort = $request->query('sort', 'id');   // Default to 'created_at'
        $direction = $request->query('direction', 'desc'); // Default to 'desc'

        // Validate sorting inputs
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'id';
        }
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        $products = Product::orderBy($sort, $direction)->paginate(5);

        return view('products.index', compact('products', 'sort', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consoles = Console::all(); // Fetch all consoles to populate the dropdown
        return view('products.create', compact('consoles'));
    }

    public function store(SaveProductRequest $request)
    {

        $product = Product::create($request->validated());

        return redirect()->route('products.show', $product)
            ->with('status', 'Product created.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $consoles = Console::all(); // Fetch all consoles from the database
        return view('products.edit', compact('product', 'consoles'));
    }

    public function update(SaveProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.show', $product)
            ->with('status', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('status', 'Product deleted.');
    }
}
