<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Banwaenraikhing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @stack('styles')
</head>
<body>

    <!-- ตรวจสอบว่าเป็นหน้า Login หรือไม่ -->
    @unless(request()->routeIs('login'))
        <!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Banwaenraikhing</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <!-- แก้ไขลิงก์ Dashboard -->
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('showproducts') }}">
                    <i class="bi bi-house-door"></i> หน้าโชว์สินค้า
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/product">
                    <i class="bi bi-box"></i> สต๊อกสินค้า
                </a>
            </li>
            
        </ul>
    </div>
</div>


        <!-- Button to trigger Offcanvas Sidebar -->
        <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            Open Sidebar
        </button>
    @endunless

    <!-- Main Content -->
    <div class="main-content" style="flex: 1; padding: 20px; margin-left: 220px;">
        @yield('content') <!-- แสดงเนื้อหาของแต่ละหน้า -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>
</html>
