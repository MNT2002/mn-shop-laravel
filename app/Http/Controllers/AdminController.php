<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\Users;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function index()
    {
        return view('admin.admin_login');
    }
    public function show_admin_dashboard()
    {
        $this->AuthLogin();

        $users = Users::get()->count();
        $approved = DB::table('tbl_oder_detail')->select('oder_id','status')->where('status',1)->groupBy('oder_id','status')->get()->count();

        $unApproved = DB::table('tbl_oder_detail')->select('oder_id','status')->where('status',0)->groupBy('oder_id','status')->get()->count();
        
        return view('admin.dashboard', [
            'users' => $users,
            'approved' => $approved,
            'unApproved' => $unApproved
        ]);
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $admin = Users::where('email', $admin_email)->where('password', $admin_password)->first();

        // foreach ($admin as $item) {
        //     echo '<pre>';
        //     echo $item;
        //     echo '</pre>';
        // }

        if(!empty($admin)) {
            if($admin->quyen == 1) {
                Session::put('admin_name', $admin->name);
                Session::put('admin_id', $admin->id);
                Session::put('admin_image_path', $admin->image_path);
                return Redirect::to('/dashboard');
            } else {
                Session::put('message', 'Tài khoản của bạn không đủ quyền truy cập');
                return Redirect::to('/admin');
            }
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu không chính xác!');
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::put('admin_image_path', null);
        return Redirect::to('/admin');
    }
}
