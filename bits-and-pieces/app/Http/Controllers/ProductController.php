<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Console;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allConsoles = Console::all();

        $colors = Product::select('colour')->distinct()->pluck('colour');

        $manufacturers = $allConsoles->pluck('manufacturer')->unique();

        if ($request->filled('manufacturer')) {
            $platforms = $allConsoles->where('manufacturer', $request->manufacturer)
                ->pluck('platform')->unique();
        } else {
            $platforms = $allConsoles->pluck('platform')->unique();
        }

        $query = Product::query();

        if ($request->filled('manufacturer')) {
            $query->whereHas('console', function ($q) use ($request) {
                $q->where('manufacturer', $request->manufacturer);
            });
        }

        if ($request->filled('platform')) {
            $query->whereHas('console', function ($q) use ($request) {
                $q->where('platform', $request->platform);
            });
        }

        if ($request->filled('connection')) {
            $query->where('connection', $request->connection);
        }

        if ($request->filled('color')) {
            $query->where('colour', $request->color);
        }

        if ($request->filled('sort_name')) {
            [$sort, $direction] = explode('|', $request->sort_name);
            $query->orderBy($sort, $direction);
        } elseif ($request->filled('sort_price')) {
            [$sort, $direction] = explode('|', $request->sort_price);
            $query->orderBy($sort, $direction);
        } else {
            $query->orderBy('id', 'desc');
        }

        $products = $query->paginate(5)->withQueryString();

        return view('products.index', compact(
            'products',
            'allConsoles',
            'colors',
            'manufacturers',
            'platforms'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consoles = Console::all();
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
        $consoles = Console::all();
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
