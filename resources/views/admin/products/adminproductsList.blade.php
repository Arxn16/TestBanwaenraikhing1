@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Manage Products</h1>

        <!-- ปุ่มเพิ่มสินค้า -->
        <div class="text-right mb-3">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success btn-lg">Add New Product</a>
        </div>

        <!-- ตรวจสอบจำนวนสินค้า -->
        @if($products->count() > 0)
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>฿{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <!-- Delete Form -->
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No products found.</p>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .container {
            max-width: 1200px;
        }

        .btn {
            font-weight: bold;
        }

        table th, table td {
            text-align: center;
        }

        table td button {
            margin-left: 5px;
        }

        .thead-dark {
            background-color: #343a40;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
@endpush
