<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Faker\Core\File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|max:40',
            'confirm_password' => 'required|same:password',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ], [
            'image.required' => 'Bạn chưa chọn ảnh đại diện',
            'image.max' => 'Ảnh không được có kích thước lớn hơn 5Mb',
            
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
        $generatedImageName = 'image'.time().'-'
                                .$request->name.'.'
                                .$request->image->extension();

        // move to a folder
        $request->image->move(public_path('backend/images/userAvata'), $generatedImageName);

        $user = Users::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password')),
            'confirm_password' => md5($request->input('confirm_password')),
            'quyen' => $request->input('quyen'),
            'image_path' => $generatedImageName,
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
        echo(123);
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
        $user = Users::find($id);
        unlink(public_path('backend/images/userAvata/' .$user->image_path));
        $user->delete();

        return redirect('/users');
    }
}
