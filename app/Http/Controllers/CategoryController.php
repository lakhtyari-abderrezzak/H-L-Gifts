<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(6);
        $contacts = Contact::all();
        return view(
            'categories.index', 
            [
            'categories' => $categories,
             'contacts' => $contacts
             ]
    );
    }
    public function cat_product($category){
        $products = Product::with('categories')->where('categories_id', $category)->get();
        return view('categories.cat_product', ['products' => $products]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'img_path' => 'nullable|file|max:5000|mimes:png,jpg,webp',
        ]);
        $path = $category->img_path ?? null; 
        if($request->hasFile('img_path')) {
            $path = Storage::disk('public')->put('category_img', $request->img_path);
        }
        Category::create([
            'name'=> $request->name,
            'description' => $request->description,
            'img_path' => $path,
        ]);
        return redirect()->route('categories.index')->with('success', 'Product was Added Successfully');
    }
    public function update(Request $request, $id){

        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'img_path' => 'nullable|file|max:5000|mimes:png,jpg,webp',
        ]);
        $path = $category->img_path ?? null; 
        if($request->hasFile('img_path')) {
            if ($category->img_path) {
                Storage::disk('public')->delete($category->img_path);
            }
            $path = Storage::disk('public')->put('category_img', $request->img_path);
        }
        $category->update([
            'name'=> $request->name,
            'description' => $request->description,
            'img_path' => $path,
        ]);
        return redirect()->route('categories.index')->with('success', 'Product was Added Successfully');

    }
    public function destroy($id)
    {
        $categories = Category::find(id: $id);
        // check if we have image then Delete it before product
        $categories->delete();
        //redirect
        return redirect()->route('dashboard.index')->with('delete', 'Category Deleted successfully!');

    }
}
