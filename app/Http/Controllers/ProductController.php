<?php

namespace App\Http\Controllers;

use App\Models\Product;  // เพิ่มการ import คลาส Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
   
    public function index()
    {
        // ดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูล
        $products = Product::all();  // ดึงข้อมูลสินค้าจากตาราง products

        // ส่งข้อมูลสินค้าไปยัง View 'admin.product'
        return view('admin.product', compact('products'));
    }

}
