<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Faker\Core\File;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->AuthLogin();
        $userList = Users::get();
        return view('admin.userList', [
            'userList' => $userList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthLogin();
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|max:40',
            'confirm_password' => 'required|same:password',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
        ], [
            'image.max' => 'Ảnh không được có kích thước lớn hơn 5Mb',
            'image.mimes' => 'Ảnh phải là file có định dạng jpg, png hoặc jpeg',

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
        $get_image = '';
        if ($request->file('image')) {
            $generatedImageName = 'image' . time() . '-'
                . $request->name . '.'
                . $request->image->extension();

            // move to a folder
            $request->image->move(public_path('upload/userAvata'), $generatedImageName);
            $get_image = $generatedImageName;
        }
        $user = Users::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
            'confirm_password' => md5($request->input('confirm_password')),
            'quyen' => $request->input('quyen'),
            'image_path' => $get_image,
        ]);
        $user->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->AuthLogin();
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->AuthLogin();
        echo ('Trang update đang bảo trì');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->AuthLogin();
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AuthLogin();
        $user = Users::find($id);
        if ($user->image_path != '') {
            unlink(public_path('upload/userAvata/' . $user->image_path));
        }
        $user->delete();

        return redirect('/users');
    }
}
