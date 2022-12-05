<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_product;
use App\Models\Products;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\DB as FacadesDB;

session_start();


class CheckoutController extends Controller
{
    public function login_checkout(Request $request){
        $meta_desc = "Chuyên bán quần áo, phụ kiện thời trang";
        $meta_keywords = "Shop bán quần áo, ban quan ao, quan ao thoi trang";
        $meta_title = "Thanh Toán";
        $url_canonical =$request->url();
    return  view('pages.checkout.login_checkout',[
        'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
    ]) ;
       
    }
    public function get_cusinfo(Request $request){
        $meta_desc = "Chuyên bán quần áo, phụ kiện thời trang";
        $meta_keywords = "Shop bán quần áo, ban quan ao, quan ao thoi trang";
        $meta_title = "Thanh Toán";
        $url_canonical =$request->url();
        $data= array();
        $data['user_id']=Session::get('user_id');
        $data['name']=$request->name;
        $data['address']=$request->address;
        $data['phonenumber']=$request->phonenumber;
        $oder_id=DB::table('tbl_oder')->insertGetId($data);
        $content=Cart::Content();
        foreach($content as $v_content) {
            $oder_data['oder_id']=$oder_id;
            $oder_data['product_id']=$v_content->id;
            $oder_data['product_name']=$v_content->name;
            $oder_data['total_price']=Cart::total();
            $oder_data['qty']=$v_content->qty;
            $oder_data['size']=$v_content->options->size;;
            DB::table('tbl_oder_detail')->insert($oder_data);
        }
        return view('pages.checkout.sucess',[
            'meta_desc' => $meta_desc,
                'meta_keywords' => $meta_keywords,
                'meta_title' => $meta_title,
                'url_canonical' => $url_canonical,
        ]) ;
        
    }

}
