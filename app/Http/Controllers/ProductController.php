<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $products = Product::paginate(12);
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $feilds = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'img_path' => 'nullable|file|max:5000|mimes:png,jpg,webp',
        ]);
        // Check if image exists
        // $path = $product->img_path ?? null;

        if($request->hasFile('img_path')) {
            $path = Storage::disk('public')->put('product_img', $request->img_path);
        }
        Product::create([
            'categories_id' => $request->categories_id,
            'name'=> $request->name,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
            'img_path' => $path,
            'description' => $request->description,
        ]);
        return redirect()->route('products.index')->with('success', 'Product was Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $products = Product::find($id);
        // dd($products);
        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product,$id)
    {
        $product = Product::find($id);
        $feilds = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'img_path' => 'nullable|file|max:5000|mimes:png,jpg,webp',
        ]);
        // Check if image exists
        $path = $product->img_path ?? null;

        if($request->hasFile('img_path')) {
            if($product->img_path){
                Storage::disk('public')->delete($product->img_path);
            }
            $path = Storage::disk('public')->put('product_img', $request->img_path);
        }
        $product->update([
            'categories_id' => $request->categories_id,
            'name'=> $request->name,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
            'img_path' => $path,
            'description' => $request->description,
        ]);
        return redirect()->route('products.index')->with('success', 'Product was Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back();
    }
}
