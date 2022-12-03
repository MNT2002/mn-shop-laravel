<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category_product;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
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
    $data['weight']=0;
    Cart::add($data);
        return Redirect::to ('/show_cart');
   }
   public function show_cart(Request $request){
    $meta_desc = "Chuyên bán quần áo, phụ kiện thời trang";
        $meta_keywords = "Shop bán quần áo, ban quan ao, quan ao thoi trang";
        $meta_title = "MN Shop";
        $url_canonical =$request->url();
    return  view('pages.cart.show_cart',[
        'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
    ]) ;
   }
   public function delete_to_cart($rowId){
    Cart::update($rowId,0);
      return Redirect::to ('/show_cart');
   }
   public function update_cart(Request $request){
    $rowId=$request->rowId_cart;
    $qty=$request->quantity;
    print_r($qty);
    Cart::update($rowId,$qty);
    return Redirect::to ('/show_cart');
   }


}