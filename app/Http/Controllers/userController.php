<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Models\Users;
use Session;
use App\Models\Category_product;
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();

class userController extends Controller
{
    public function index(Request $request)
    {
        //Seo
        $meta_desc = "";
        $meta_keywords = "Đăng nhập MN Shop, dang nhap mn shop";
        $meta_title = "Đăng nhập";
        $url_canonical = $request->url();
        //--Seo

        $categories = Category_product::where('category_status', '1')->get()->sortBy('category_id');
        return view('pages.login_page', [
            'categories' => $categories,

            'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
        ]);
    }
    public function sign_up_index(Request $request)
    {
        //Seo
        $meta_desc = "";
        $meta_keywords = "Đăng kí MN Shop, dang ki mn shop";
        $meta_title = "Đăng kí";
        $url_canonical = $request->url();
        //--Seo
        $categories = Category_product::where('category_status', '1')->get()->sortBy('category_id');
        return view('pages.sign_up_page', [
            'categories' => $categories,
            'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
        ]);
    }
    public function login(Request $request)
    {
        $email = $request->email_login;
        $password = md5($request->password_login);

        $user = Users::where('email', $email)->where('password', $password)->first();

        if ($user) {
            Session::put('user_name', $user->name);
            Session::put('user_id', $user->name);
            Session::put('user_level', $user->quyen);
            Session::put('message_success', 'Đăng nhập thành công');
            return Redirect::to('/');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu không chính xác');
            return Redirect::to('/login-page');
        }
    }
    public function sign_up(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|max:40',
            'confirm_password' => 'required|same:password',
            // 'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ], [
            // 'image.required' => 'Bạn chưa chọn ảnh đại diện',
            // 'image.max' => 'Ảnh không được có kích thước lớn hơn 5Mb',

            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',

            'email.required' => 'Bạn chưa nhập email người dùng',
            'email.email' => 'Bạn nhập sai định dạng email',
            'email.unique' => 'Email đã tồn tại',

            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 4 kí tự',
            'password.max' => 'Mật khẩu phải có nhiều nhất 40 kí tự',

            'confirm_password.required' => 'Mật khẩu nhập lại không khớp',
            'confirm_password.same' => 'Mật khẩu nhập lại không khớp',


        ]);

        $user = Users::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
            'confirm_password' => md5($request->input('confirm_password')),
            'quyen' => 0,
            'image_path' => '',
        ]);

        Session::put('user_name', $user->name);
        Session::put('user_id', $user->name);
        Session::put('user_level', $user->quyen);
        Session::put('message_success_signUP', 'Đăng kí thành công');
        $user->save();
        return redirect('/'); 
        // same
        // return Redirect::to('/');
    }
    public function logout()
    {
        Session::put('user_name', null);
        Session::put('user_id', null);
        Session::put('user_level', null);
        Cart::destroy();
        return Redirect::to('/');
       
    }
}
