<?php

namespace App\Http\Controllers;

use App\Models\Product;  // เพิ่มการ import คลาส Product
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function upload(Request $request)
    {
        // การอัพโหลดไฟล์
        $request->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // อัพโหลดไฟล์และเก็บไว้ใน storage
        $path = $request->file('product_image')->store('products', 'public');

        return back()->with('uploaded_image', $path);
    }

    public function edit($id)
{
    // ค้นหาสินค้าด้วย ID ที่ส่งมาจาก URL
    $product = Product::findOrFail($id);

    // ส่งข้อมูลสินค้าผ่าน View สำหรับการแก้ไข
    return view('product.edit', compact('product'));
}

public function showDetails($id)
{
    $product = Product::findOrFail($id);
    return view('product.details', compact('product'));
}




}
