<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        
    }
    
    public function ordered() {
        $oder_id=DB::table('tbl_oder_detail')->where('status',1)->select('oder_id')->groupby('oder_id')->get(); 
        $oder_detail = DB::table('tbl_oder_detail')->get();
        $oder = DB::table('tbl_oder')->get();

        return view('/admin.ordered', [
            'oder_id' => $oder_id,
            'oder_detail' => $oder_detail,
            'oder' => $oder
        ]);
    }

    public function un_order() {
        $oder_id=DB::table('tbl_oder_detail')->where('status',0)->select('oder_id')->groupby('oder_id')->get(); 
        $oder_detail = DB::table('tbl_oder_detail')->get();
        $oder = DB::table('tbl_oder')->get();

        // foreach($oder_id as $item) {
        //     foreach ($oder as $o) {
        //         if ($o->oder_id == $item->oder_id) {
        //             print_r($o) ;
        //             break;
        //         }
        //     }
        //     foreach ($oder_detail as $i) {
        //         if($i->oder_id == $item->oder_id) {
        //             echo '<pre>';
        //             print_r($i);
        //             echo '</pre>';
        //         }
        //     }
        // }
        
        return view('/admin.unOrder', [
            'oder_id' => $oder_id,
            'oder_detail' => $oder_detail,
            'oder' => $oder
        ]);
    }

    public function order($oder_id) {
        $data = array();
        $data['status'] = 1;
        // echo $oder_id;
        // echo '<pre>';
        DB::table('tbl_oder_detail')->where('oder_id',$oder_id)->update(['status'=>1]);
        // echo '</pre>';
        

        return view('/admin.unOrder');
    }
}
