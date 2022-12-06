<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category_product;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use PhpOption\Option;
use Session;
session_start();
class CartController extends Controller
{
   public function save_cart(Request $request){
    
    

    $productID = $request->productid_hidden;
    $quantity=$request->qty;
    $productsize=$request->size;
    $product_info = Products::where('product_id',$productID)->first();
    $data['id']=$productID;
    $data['qty']=$quantity;
    $data['name']=$product_info->product_name;
    $data['price']=$product_info->product_price;
    $data['options']['image']=$product_info->product_image_path;
    $data['options']['size']= $productsize;
    $data['options']['discount']= ($product_info->product_discount)*0.01;
    $data['weight']=0;

    Cart::add($data);
        return Redirect::to ('/danh-muc-san-pham/'. $product_info->category_id);
   }
   public function show_cart(Request $request){
    $meta_desc = "";
    $meta_keywords = "";
    $meta_title = "Giỏ hàng";
    $url_canonical =$request->url();

    $products = Products::where('product_status', '1')->get()->sortByDesc('product_id');

    $categories = Category_product::where('category_status', '1')->get()->sortBy('category_id');
    return  view('pages.cart.show_cart',[
        'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
            'categories' => $categories,
            'products' => $products

    ]) ;
   }
   public function delete_to_cart($rowId){
    Cart::update($rowId,0);
      return Redirect::to ('/show_cart');
      
   }
   public function update_cart(Request $request){
    $rowId=$request->rowId_cart;
    $qty=$request->number;
    print_r($qty);
    Cart::update($rowId,$qty);
    return Redirect::to ('/show_cart');
   }
   public function update_cart_size(Request $request){
// Cart::destroy();
    $rowId=$request->rowId_cart;
    $size=$request->prd_size;
   print_r($size);
   $content=Cart::content();
   foreach($content as $v_content){
       $image=$v_content->options->image;
       $discount=$v_content->options->options->discount;
   }
    Cart::update($rowId,['options' => ['size' => $size,'image'=>$image,'discount'=>$discount]]);
    return Redirect::to ('/show_cart');
   }


}
