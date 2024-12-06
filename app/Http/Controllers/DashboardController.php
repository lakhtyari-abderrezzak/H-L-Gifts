<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(User $user){
        $categories = Category::paginate(3);
        $products = Product::all();
        return view('dashboard.index', ['categories'=> $categories, 'products' => $products]);
    }
    public function edit($id){
        $categories = Category::findOrFail($id );
        return view('dashboard.edit', ['categories' => $categories]);
    }
    public function edit_product($id){
        $product = Product::findOrFail($id );
        $categories = Category::all();

        return view('dashboard.edit_product', ['product' => $product, 'categories'=> $categories]);
    }
    public function add(){
        $categories = Category::all();
        return view('dashboard.add', ['categories'=> $categories]);
    }
    public function latest(){
        return view('dashboard.latest');
    }
}
