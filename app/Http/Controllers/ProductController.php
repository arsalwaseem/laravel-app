<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable|string|max:255'
        ]);

        // Product Find or Fail :: 404 if Failed
        $product = Product::findOrFail($id);

        // Enable this method if updation needed directly from the terminal
        
        // if ($product) {
        //     $product->name = 'Samsung';
        //     $product->price = 250000;
        //     $product->save();
        //     return "Product ID $id is updated";
        // } else {
        //     return "Product not found";
        // };

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect("/product-data/{$id}/edit")->with('success', 'Product updated successfully!');
    }

    public function edit($id)
    {
        $products = Product::findorFail($id);
        return view('products.edit', compact('products'));

    }
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return "Product ID $id is Deleted";
        } else {
            return "Product not found";
        }
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable|string|max:1000',
        ]);

        // Create Product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        

        // Redirect
        return redirect('/products/create')->with('success', 'Product created successfully!');
    }
}
