<!DOCTYPE html>
<html lang="th">
<head>
    <!-- กำหนดตัวอักษร (charset) เป็น UTF-8 เพื่อรองรับตัวอักษรพิเศษ -->
    <meta charset="utf-8" />

    <!-- กำหนด viewport สำหรับการแสดงผลในมือถือ -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ชื่อเว็บไซต์ที่จะปรากฏบนแท็บของเบราว์เซอร์ -->
    <title>Banwaenraikhing</title>

    <!-- เชื่อมโยง Bootstrap CSS สำหรับการตกแต่งและการใช้งานฟังก์ชันต่างๆ เช่น ปุ่ม, ตาราง, เมนู ฯลฯ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- เชื่อมโยง Google Fonts (ใช้ฟอนต์ Roboto ในกรณีนี้) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- เชื่อมโยง Favicon (ไอคอนเว็บไซต์ที่จะแสดงในแท็บของเบราว์เซอร์) -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- เพิ่ม CSS ของคุณเองได้ที่นี่ เช่น การปรับแต่งเพิ่มเติม -->
    @stack('styles') <!-- ใช้สำหรับการเพิ่ม CSS เฉพาะในหน้าเว็บ -->
</head>
<body>
    <!-- เนื้อหาของเว็บไซต์จะถูกแสดงที่นี่ -->
    <div class="container py-5">
        @yield('content') <!-- แสดงเนื้อหาของหน้าเว็บไซต์ -->
    </div>

    <!-- เชื่อมโยง jQuery (สำหรับการใช้งาน JavaScript ที่ต้องการ jQuery) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- เชื่อมโยง Popper.js (รองรับการทำงานของ Bootstrap เช่น dropdowns, tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- เชื่อมโยง Bootstrap JS (ใช้งานฟังก์ชันต่างๆ ของ Bootstrap เช่น การจัดการ modal, carousel, การปิด/เปิดเมนู ฯลฯ) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- เพิ่ม JavaScript ของคุณเองได้ที่นี่ -->
    @stack('scripts') <!-- ใช้สำหรับการเพิ่ม JS เฉพาะในหน้าเว็บ -->
</body>
</html>
