<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_product;
use App\Models\Products;
class PagesController extends Controller
{
    public function index() {
        $products = Products::all()->sortByDesc('product_id');

        $categories = Category_product::where('category_status', '1')->get()->sortBy('category_id');
        return view('pages.home', [
            'categories' => $categories,
            'products' => $products,
        ]);
        // return view('pages.home')->with('categories',$categories);
    }
}
