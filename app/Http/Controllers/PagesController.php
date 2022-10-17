<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_product;
use App\Models\Products;
class PagesController extends Controller
{
    public function index(Request $request) {
        //Seo
        $meta_desc = "Chuyên bán quần áo, phụ kiện thời trang";
        $meta_keywords = "Shop bán quần áo, ban quan ao, quan ao thoi trang";
        $meta_title = "MN Shop";
        $url_canonical = $request->url();
        //--Seo

        $products = Products::where('product_status', '1')->get()->sortByDesc('product_id');
        $newProducts = $products->take(8);

        $categories = Category_product::where('category_status', '1')->get()->sortBy('category_id');
        return view('pages.home', [
            'categories' => $categories,
            'products' => $products,
            'newProducts' => $newProducts,

            'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
        ]);
        // return view('pages.home')->with('categories',$categories);
    }
    public function search(Request $request) {
        //Seo
        $meta_desc = "";
        $meta_keywords = "";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--Seo

        $products = Products::where('product_status', '1')->get()->sortByDesc('product_id');
        $search_products = Products::where('product_status', '1')->where('product_name','like','%' .$request->search_keywords. '%')->get()->sortByDesc('product_id');

        $categories = Category_product::where('category_status', '1')->get()->sortBy('category_id');
        return view('pages.product.search', [
            'categories' => $categories,
            'products' => $products,
            'search_products' => $search_products,

            'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
        ]);
    }
}
