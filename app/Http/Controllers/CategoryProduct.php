<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_product;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
 
class CategoryProduct extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    
    public function add_category_product() {
        $this->AuthLogin();
        return view('admin.addCategoryProduct');
    }

    public function all_category_product() {
        $this->AuthLogin();
        $all_category_product = Category_product::get();
        return view('admin.allCategoryProduct')->with('all_category_product', $all_category_product);
    }

    public function save_category_product(Request $request) {
        $this->AuthLogin();
        $request->validate([
            'category_product_name' => 'required|min:2|unique:tbl_category_product,category_name',
        ], [
            'category_product_name.required' => 'Bạn chưa nhập tên danh mục',
            'category_product_name.unique' => 'Danh mục đã tồn tại',
            'category_product_name.min' => 'Tên danh mục dùng phải có ít nhất 2 ký tự',
        ]);
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        Category_product::insert($data);

        Session::put('message','Thêm thành công');
        return Redirect::to('add-category-product');
    }

    public function unactive_category_product($category_product_id) {
        $this->AuthLogin();
        Category_product::where('category_id', $category_product_id)->update(['category_status'=>0]);
        Session::put('message','Không hiện danh mục sản phẩm');
        return Redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id) {
        $this->AuthLogin();
        Category_product::where('category_id', $category_product_id)->update(['category_status'=>1]);
        Session::put('message','Hiện danh mục sản phẩm');
        return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id) {
        $this->AuthLogin();
        $all_category_product = Category_product::where('category_id',$category_product_id)->get();
        return view('admin.editCategoryProduct')->with('edit_category_product', $all_category_product);
    }

    public function update_category_product(Request $request, $category_product_id) {
        $this->AuthLogin();
        $request->validate([
            'category_product_name' => 'required|min:2|unique:tbl_category_product,category_name',
        ], [
            'category_product_name.required' => 'Bạn chưa nhập tên danh mục',
            'category_product_name.unique' => 'Danh mục đã tồn tại',
            'category_product_name.min' => 'Tên danh mục phải có ít nhất 2 ký tự',
        ]);
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        Category_product::where('category_id', $category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id) {
        $this->AuthLogin();
        Category_product::where('category_id', $category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
}
