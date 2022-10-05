<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_product;
use App\Models\Products;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ProductController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_product() {
        $this->AuthLogin();
        $cate_product = Category_product::all()->sortBy('category_id');
        return view('admin.addProduct')->with('category_product', $cate_product);
    }

    public function all_product() {
        $this->AuthLogin();
        $all_product = Products::join('tbl_category_product','tbl_product.category_id','=' ,'tbl_category_product.category_id')->get()->sortByDesc('product_id');
        return view('admin.allProduct')->with('all_product', $all_product);
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
        $request->validate([
            'product_name' => 'required|min:2|unique:tbl_product,product_name',
            'product_price' => 'required',
            'product_desc' => 'required',
            'product_image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ], [
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm',
            'product_name.unique' => 'Sản phẩm đã tồn tại',
            'product_name.min' => 'Tên sản phẩm phải có ít nhất 2 ký tự',
            
            'product_price.required' => 'Bạn chưa nhập giá sản phẩm',

            'product_desc.required' => 'Bạn chưa nhập mô tả cho sản phẩm',
            
            'product_image.required' => 'Bạn chưa thêm ảnh cho sản phẩm',
            'product_image.mimes' => 'Ảnh phải là file có định dạng jpg, png hoặc jpeg',
            'product_image.max' => 'Ảnh không được có kích thước lớn hơn 5Mb',
        ]);

        
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_category;
        $data['product_status'] = $request->product_status;
        if($request->file('product_image')) {
            $generatedImageName = 'product_image'.time().'-'
                                    .$request->product_name.'.'
                                    .$request->product_image->extension();
            // move to a folder
            $request->product_image->move(public_path('upload/product'), $generatedImageName);
            $data['product_image_path'] = $generatedImageName;
        } else {
            $data['product_image_path'] = '';
        }

        Products::insert($data);

        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function unactive_product($product_id) {
        $this->AuthLogin();
        Products::where('product_id', $product_id)->update(['product_status'=>0]);
        Session::put('message','Không hiện sản phẩm');
        return Redirect::to('all-product');
    }

    public function active_product($product_id) {
        $this->AuthLogin();
        Products::where('product_id', $product_id)->update(['product_status'=>1]);
        Session::put('message','Hiện sản phẩm');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id) {
        $this->AuthLogin();
        $category_product = Category_product::all()->sortBy('category_id'); 

        $edit_product = Products::where('product_id',$product_id)->get();
        return view('admin.editProduct',[
            'edit_product'=> $edit_product,
            'category_product'=> $category_product,
        ]);
    }

    public function update_product(Request $request, $product_id) {
        $this->AuthLogin();
        $request->validate([
            'product_name' => 'required|min:2|unique:tbl_product,product_name',
            'product_price' => 'required',
            'product_desc' => 'required',
            'product_image' => 'mimes:jpg,png,jpeg|max:5048',
        ], [
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm',
            'product_name.unique' => 'Sản phẩm đã tồn tại',
            'product_name.min' => 'Tên sản phẩm phải có ít nhất 2 ký tự',
            
            'product_price.required' => 'Bạn chưa nhập giá sản phẩm',

            'product_desc.required' => 'Bạn chưa nhập mô tả cho sản phẩm',
            
            // 'product_image.required' => 'Bạn chưa thêm ảnh cho sản phẩm',
            'product_image.mimes' => 'Ảnh phải là file có định dạng jpg, png hoặc jpeg',
            'product_image.max' => 'Ảnh không được có kích thước lớn hơn 5Mb',
        ]);

        $product = Products::where('product_id', $product_id);
        
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_category;
        $data['product_status'] = $request->product_status;
        if($request->file('product_image')) {
            $generatedImageName = 'product_image'.time().'-'
                                    .$request->product_name.'.'
                                    .$request->product_image->extension();
            
            $productItemt = $product->get();
            if ($productItemt[0]->product_image_path != '') {
                unlink(public_path('upload/product/' . $productItemt[0]->product_image_path));
            }
                                    // move to a folder
            $request->product_image->move(public_path('upload/product'), $generatedImageName);

            $data['product_image_path'] = $generatedImageName;
        }
        $product->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function delete_product($product_id) {
        $this->AuthLogin();
        $product = Products::find($product_id);
        if ($product->product_image_path != '') {
            unlink(public_path('upload/product/' . $product->product_image_path));
        }
        $product->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
}
