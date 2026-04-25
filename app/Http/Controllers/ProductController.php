<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $products = Product::with(['user', 'category'])->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        return view('product.view', compact('product'));
    }

    public function edit(Product $product)
    {
        // $this->authorize('update', $product); // Keep if existing
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // $this->authorize('update', $product); // Keep if existing
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function delete(Product $product)
    {
        // $this->authorize('delete', $product); // Keep if existing
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }

    public function export()
    {
        $products = Product::with(['user', 'category'])->get();
        
        $filename = "products_" . date('Y-m-d_H-i-s') . ".csv";
        $handle = fopen('php://output', 'w');
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        fputcsv($handle, ['#', 'Name', 'Quantity', 'Price', 'Owner', 'Category']);
        
        foreach ($products as $index => $product) {
            fputcsv($handle, [
                $index + 1,
                $product->name,
                $product->quantity,
                $product->price,
                $product->user->name ?? '-',
                $product->category->name ?? '-'
            ]);
        }
        
        fclose($handle);
        exit;
    }
}
