@extends('layouts.app')

@push('styles')
<style>
    /* Custom Styles */
    .card {
        border-radius: 10px;
    }
    .table {
        margin-top: 20px;
    }
    .btn-sm {
        font-size: 14px;
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
    .badge {
        font-size: 12px;
    }
    @media (max-width: 768px) {
        .card-header h4 {
            font-size: 18px;
        }
        .table th, .table td {
            font-size: 12px;
        }
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4>{{ __('รายการสินค้า') }}</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- ตรวจสอบการแสดงข้อมูลสินค้า -->
                    <div class="table-responsive">
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
                                        <td><img src="{{ $product->image_url }}" alt="{{ $product->product_name }}" class="img-fluid rounded" width="100"></td>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ number_format($product->price, 2) }} บาท</td>
                                        <td>{{ $product->stock_quantity }}</td>
                                        <td>
                                            @if($product->listing)
                                                <span class="badge bg-success">Listed</span>
                                            @else
                                                <span class="badge bg-danger">Not Listed</span>
                                            @endif
                                        </td>
                                        <td>
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
                        <button type="submit" class="btn btn-danger mt-3">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
