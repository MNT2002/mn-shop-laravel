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
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;

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
        $freq=DB::table('users')->get()->where('id',Session::get('user_id'))->first();
        $subtotal=0;
        foreach($content as $v_content) {
            $oder_data['oder_id']=$oder_id;
            $oder_data['product_id']=$v_content->id;
            $oder_data['product_name']=$v_content->name;
            $temp=$freq->freq;
            if($temp==0 ){
                $oder_data['total_price']=($v_content->price)*($v_content->qty)*(1-$v_content->options->discount)*0.9;
            }
            else
            if($temp/5==0)
            {
                $oder_data['total_price']=($v_content->price)*($v_content->qty)*(1-$v_content->options->discount)*0.85;  
            }
            else
            {
                $oder_data['total_price']=($v_content->price)*($v_content->qty)*(1-$v_content->options->discount);
            }
             $subtotal+=$oder_data['total_price'];
            $oder_data['qty']=$v_content->qty;
            $oder_data['size']=$v_content->options->size;;
            DB::table('tbl_oder_detail')->insert($oder_data);
        }
        $freqafter=($freq->freq)+1;
       DB:: table('users')->where('id',Session::get('user_id'))->update(['freq'=>$freqafter]);
       DB::table('tbl_oder')->where('oder_id',$oder_id)->update(['subtotal'=>$subtotal]);

       Cart::destroy();
        return view('pages.checkout.sucess',[
            'meta_desc' => $meta_desc,
                'meta_keywords' => $meta_keywords,
                'meta_title' => $meta_title,
                'url_canonical' => $url_canonical,
        ]) ;
    }

}
