<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;

session_start();

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }
    public function show_admin_dashboard()
    {
        return view('admin.dashboard');
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
            } else {
                Session::put('message', 'Tài khoản của bạn không đủ quyền truy cập');
            return Redirect::to('/admin');
            }

            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu không chính xác!');
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::put('admin_image_path', null);
        return Redirect::to('/admin');
    }
}
