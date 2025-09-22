<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Banwaenraikhing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }
        .sidebar {
            background-color: #343a40; /* สีเทาเข้ม */
            color: #fff;
            min-height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link {
            color: #b8c6d3;
            padding: 12px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }
        .container-fluid {
            display: flex;
            margin-left: 220px; /* ให้เนื้อหาหลักไม่ทับกับ sidebar */
        }
        .main-content {
            background-color: #ffffff;
            flex: 1;
            padding: 20px;
        }
        .footer {
            background-color: #006400;
            color: white;
            padding: 10px;
            text-align: center;
        }

        /* ทำให้ข้อความในตารางชิดซ้าย */
        .table th, .table td {
            text-align: left;  /* ตั้งค่าตัวหนังสือใน th และ td ให้อยู่ทางซ้าย */
        }
    </style>
</head>
<body>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Banwaenraikhing</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">
                        <i class="bi bi-box"></i> สต๊อกสินค้า
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-cart"></i> การจัดการสินค้า
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-pencil"></i> รายงาน
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Button to trigger Offcanvas Sidebar -->
    <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
        Open Sidebar
    </button>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h2>ยินดีต้อนรับสู่ Banwaenraikhing</h2>
            <p>ที่นี่จะเป็นเนื้อหาหลักของเว็บไซต์ที่แสดงผลจากเมนูข้างๆ.</p>

            <!-- รายการสินค้า -->
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
                                    <th>ดูรายละเอียดสินค้า</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->product_name }}" class="img-fluid rounded" width="100"></td>
                                        <td>{{ $product->product_code }}</td>  <!-- ตัวหนังสือชิดซ้าย -->
                                        <td>{{ $product->product_name }}</td>  <!-- ตัวหนังสือชิดซ้าย -->
                                        <td>{{ number_format($product->price, 2) }} บาท</td>  <!-- ตัวหนังสือชิดซ้าย -->
                                        <td>{{ $product->stock_quantity }}</td>  <!-- ตัวหนังสือชิดซ้าย -->
                                        <td class="text-center">
                                            @if($product->listing)
                                                <span class="badge bg-success">Listed</span>
                                            @else
                                                <span class="badge bg-danger">Not Listed</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="/product/{{ $product->id }}" class="btn btn-info btn-sm">ดูรายละเอียดสินค้า</a>
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

    <div class="footer">
        <p>&copy; 2025 Banwaenraikhing</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
