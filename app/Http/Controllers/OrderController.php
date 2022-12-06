<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        
    }
    
    public function ordered() {
        
        return view('/admin.ordered');
    }

    public function un_order() {

        return view('/admin.unOrder');
    }
}
