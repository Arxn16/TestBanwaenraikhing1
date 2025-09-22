@extends('layouts.app')

@push('styles')
<style>
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
    .form-group {
        margin-bottom: 15px;
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h4>{{ __('รายการสินค้า') }}</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- ฟอร์มสำหรับการอัพโหลดรูปภาพ -->
                    <form action="{{ route('product.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="product_image" required>
                        <button type="submit">อัพโหลด</button>
                    </form>
                    <hr>

                    <!-- แสดงรูปภาพที่อัพโหลดแล้ว -->
                    @if (isset($uploaded_image))
                        <div class="text-center">
                            <h5>รูปภาพที่อัพโหลดแล้ว:</h5>
                            <img src="{{ asset('storage/' . $uploaded_image) }}" class="img-fluid rounded" alt="Uploaded Image">
                        </div>
                    @endif

                    <!-- ตารางแสดงข้อมูลสินค้า -->
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวนสินค้า</th>
                                    <th>Listing</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->product_name }}" class="img-fluid rounded" width="100"></td>
                                        <td class="text-center">{{ $product->product_code }}</td>
                                        <td class="text-center">{{ $product->product_name }}</td>
                                        <td class="text-center">{{ number_format($product->price, 2) }} บาท</td>
                                        <td class="text-center">{{ $product->stock_quantity }}</td>
                                        <td class="text-center">
                                            @if($product->listing)
                                                <span class="badge bg-success">Listed</span>
                                            @else
                                                <span class="badge bg-danger">Not Listed</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-sm">แก้ไข</a>
                                            <a href="#" class="btn btn-danger btn-sm">ลบ</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">ไม่มีสินค้าภายในระบบ</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- ปุ่มออกจากระบบ -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
