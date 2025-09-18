<?php

namespace App\Http\Controllers;

use App\Models\Product; // เพิ่มบรรทัดนี้
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productsList()
    {
        $products = Product::all(); // ตรวจสอบว่าเรียกข้อมูลสินค้าได้หรือไม่
        return view('admin.products.adminproductsList', compact('products'));
    }
    public function edit($id)
{
    $product = Product::find($id);
    return view('admin.products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::find($id);
    $product->name = $request->name;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
}

public function destroy($id)
{
    $product = Product::find($id);
    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
    ]);

    // บันทึกข้อมูลสินค้าใหม่
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
}

// ใน ProductController.php
public function create()
{
    // คืนค่าหน้า view สำหรับเพิ่มสินค้า
    return view('admin.products.create'); // เส้นทางไปยังฟอร์มการเพิ่มสินค้า
}



}
