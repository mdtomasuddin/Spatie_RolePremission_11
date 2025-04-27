<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('product.create');
    }


    //user store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        Product::create([
            'name' => $request->name,
            'detail' => $request->description,
        ]);
        return redirect()->route('product.index')->with('success', 'User created successfully.');
    }

    //product edit 
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product]);
    }


    //product update 
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:1000',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->detail = $request->detail;
        $product->save();
        return redirect()->route('product.index')->with('success', 'product updated successfully.');
    }

    //product delete
public function destroy($id)
{
    $Product = Product::findOrFail($id);
    $Product->delete();
    return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
}


 //Product show
 public function show($id)
 {
     $product = Product::findOrFail($id);
     return view('product.show', 
     ['product' => $product]
    );
 }
}
