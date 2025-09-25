<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Banwaenraikhing Homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand:#004d40;        
            --brand-600:#004d40;
            --brand-700:#004d40;    
            --text:#1e293b;         
            --muted:#64748b;        
            --bg:#f6f7f9;           
            --card:#ffffff;         
            --radius:18px;
            --shadow:0 10px 25px rgba(0,0,0,.07);
            --content-width: 1100px;
        }
        *{box-sizing:border-box}
        html,body{margin:0; padding:0; font-family:"Prompt",system-ui,-apple-system,Segoe UI,Roboto; color:var(--text); background:var(--bg)}
        a{color:inherit; text-decoration:none}
        img{max-width:100%; display:block}
        .container{max-width:1200px; margin:0 auto; padding:0 20px}

        .topbar{background:var(--brand); color:#fff; font-size:.92rem}
        .topbar .container{display:flex; align-items:center; justify-content:space-between; min-height:44px}
        .topbar .info{display:flex; gap:14px; align-items:center}
        .topbar .social{display:flex; gap:12px}

        header{background:#fff; position:sticky; top:0; z-index:40; box-shadow:0 1px 0 rgba(0,0,0,.06)}
        .nav{display:flex; align-items:center; gap:18px; min-height:66px}
        .brand{display:flex; align-items:center; gap:10px; font-weight:700; font-size:1.35rem; color:var(--brand-700)}
        .brand .logo{width:28px;height:28px;border-radius:8px; background:linear-gradient(135deg,var(--brand),#79d49c)}
        .navlinks{display:flex; gap:14px; align-items:center; flex-wrap:wrap}
        .navlinks a{padding:8px 10px; border-radius:10px; color:#0f172a}
        .navlinks a:hover{background:#f0fdf4}

        .searchbar{margin-left:auto; display:flex; align-items:center; gap:10px; flex:1}
        .searchbar form{display:flex; flex:1; max-width:560px; background:#f1f5f9; border-radius:999px; padding:6px}
        .searchbar input{flex:1; border:0; outline:0; background:transparent; padding:10px 14px; font-size:.98rem}
        .searchbar button{border:0; padding:10px 16px; border-radius:999px; background:var(--brand-600); color:#fff; cursor:pointer; font-weight:600}
        .searchbar button:hover{filter:brightness(.95)}

        .icons{display:flex; gap:12px; align-items:center}
        .iconbtn{width:40px;height:40px;border-radius:12px; display:grid; place-items:center; background:#f1f5f9}

        .hero{margin-top:18px}
        .slider{
            position:relative; border-radius:var(--radius); overflow:hidden; background:#ddd; box-shadow:var(--shadow);
            max-width: var(--content-width);
            margin: 0 auto;
        }
        .slides{display:flex; transition:transform .6s ease}
        .slide{min-width:100%; display:grid; grid-template-columns:1fr 1fr}
        .slide .left{background:#004d40; color:#fff; padding:40px 36px; display:flex; align-items:center}
        .slide .left .inner{max-width:520px}
        .slide .left h1{font-size:2.1rem; margin:.2rem 0 .5rem}
        .slide .left p{opacity:.92; line-height:1.6}
        .slide .left .cta{margin-top:18px; background:#fff; color:#5e3b2e; border:0; padding:12px 18px; border-radius:12px; font-weight:600; cursor:pointer}
        .slide .right{position:relative}
        .slide .right img{width:100%; height:100%; object-fit:cover}

        .grid{ max-width: var(--content-width); margin:0 auto; display:grid; grid-template-columns:repeat(12,1fr); gap:18px }
        .product{ grid-column:span 3; background:var(--card); border-radius:16px; overflow:hidden; box-shadow:var(--shadow); position:relative }
        @media (max-width:900px){ .product{ grid-column:span 4 } }
        @media (max-width:640px){ .product{ grid-column:span 12 } }

        .product .thumb{ position:relative; background:#fff; display:grid; place-items:center; height:180px }
        .product .thumb img{ width:100%; height:100%; object-fit:contain; padding:10px }
        .badge{ position:absolute; left:10px; top:10px; font-size:.78rem; font-weight:700; background:#ef4444; color:#fff; padding:4px 8px; border-radius:8px; }
        .product .body{ padding:12px 14px }
        .catname{ color:var(--muted); font-size:.78rem; text-transform:uppercase; letter-spacing:.04em }
        .pname{ margin:6px 0 6px; font-weight:700; line-height:1.3 }
        .rating{ font-size:.9rem; color:#f59e0b }
        .price{ display:flex; align-items:center; gap:8px; margin-top:6px }
        .price .old{ text-decoration:line-through; opacity:.6 }
        .price .new{ font-weight:800 }
        .actions{ display:flex; align-items:center; justify-content:space-between; padding:10px 14px 14px }
        .btn-sm{ border:0; background:var(--brand-600); color:#fff; padding:10px 12px; border-radius:10px; font-weight:700; cursor:pointer }
        .btn-sm:hover{ filter:brightness(.95) }

        /* Modal สำหรับแสดงรูป */
        .img-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0; top: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,.8);
            align-items:center;
            justify-content:center;
        }

        .img-modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,.6);
        }
        .img-modal .close {
            position: absolute;
            top: 20px; right: 30px;
            font-size: 36px; font-weight: bold; color: #fff;
            cursor: pointer;
        }

        .category-tabs {
        display: flex;
        gap: 16px;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .category-tab {
        padding: 8px 16px;
        background: #f1f5f9;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .category-tab:hover {
        background-color: #004d40;
        color: white;
    }

    .category-tab.active {
        background-color: #004d40;
        color: white;
    }
    </style>
</head>
<body>
    <!-- Top bar -->
    <div class="topbar">
        <div class="container">
            <div class="info"><i>📞</i> <strong>ติดต่อเรา</strong> 10 101 1010</div>
            <div class="social"><a href="#" aria-label="facebook">📘</a><a href="#" aria-label="line">💬</a><a href="#" aria-label="tiktok">🎵</a></div>
        </div>
    </div>

    <!-- Header / navigation -->
    <header>
        <div class="container nav" id="nav">
            <a class="brand" href="#"><span class="logo"></span>Banwaenraikhing</a>
            <nav class="navlinks" id="links">
                <a href="#">Categories ▾</a>
                <a href="#">โปรโมชั่น</a>
                <a href="#">บทความ</a>
                <a href="#">ติดต่อ</a>
                <a href="#">ร่วมงานกับเรา</a>
            </nav>
        </div>
    </header>

<!-- Categories -->
<section class="section">
    <div class="head">
        <h2 style="margin:0">แว่นตาแนะนำ</h2>
    </div>

    <!-- หมวดหมู่ -->
    <div class="category-tabs">
        <button class="category-tab active" onclick="filterCategory('ทั้งหมด')">ทั้งหมด</button>
        <button class="category-tab" onclick="filterCategory('แว่นสายตา')">แว่นสายตา</button>
        <button class="category-tab" onclick="filterCategory('แว่นกันแดด')">แว่นกันแดด</button>
        <button class="category-tab" onclick="filterCategory('เลนส์เสริม')">เลนส์เสริม</button>
        <button class="category-tab" onclick="filterCategory('อุปกรณ์ดูแลเลนส์')">อุปกรณ์ดูแลเลนส์</button>
    </div>

    <div class="grid" id="productGrid">
        @foreach ($products as $product)
        <article class="product card" data-category="{{ $product->category }}">
            <div class="thumb">
                <img src="{{ asset('storage/' . ($product->image ?? 'default-image.jpg')) }}" alt="{{ $product->name }}"/>
                @if($product->off)
                    <span class="badge">{{ $product->off }}%</span>
                @endif
            </div>
            <div class="body">
                <div class="catname">{{ $product->category }}</div>
                <div class="pname">{{ $product->product_name }}</div>
                <div class="rating" aria-label="rating {{ $product->rating }} stars">
                    {!! str_repeat('★', $product->rating) !!}
                    {!! str_repeat('☆', 5 - $product->rating) !!}
                </div>
                <div class="price">
                   <span class="new">฿{{ number_format($product->price, 2) }}</span>
                </div>
            </div>
            <div class="actions">
                <button class="btn-sm">เพิ่มลงตะกร้า</button>
                <button class="btn-sm" style="background:#0ea5e9">ดูสินค้า</button>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Modal สำหรับแสดงรูป -->
    <div id="imgModal" class="img-modal">
        <span class="close" onclick="closeModal()">×</span>
        <img class="modal-content" id="modalImg">
    </div>
</section>
    <!-- Footer -->
   <footer style="background-color: var(--brand); color: #fff; padding: 30px 0; border-top: 1px solid rgba(255, 255, 255, 0.3);">
    <div class="container" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
        <!-- ข้อมูลเกี่ยวกับร้าน -->
        <div style="flex: 1; padding: 10px;">
            <h4>Banwaenraikhing Optical</h4>
            <p>ศูนย์รวมแว่นตาแฟชั่นและสายตา เลนส์คุณภาพสูง บริการวัดสายตาโดยผู้เชี่ยวชาญ พร้อมโปรโมชั่นพิเศษตลอดปี</p>
        </div>

        <!-- หมวดหมู่ -->
        <div style="flex: 1; padding: 10px;">
            <h4>หมวดหมู่</h4>
            <ul style="list-style-type: none; padding: 0;">
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">แว่นสายตา</a></li>
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">แว่นกันแดด</a></li>
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">เลนส์เสริม</a></li>
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">อุปกรณ์ดูแลเลนส์</a></li>
            </ul>
        </div>

        <!-- บริการ -->
        <div style="flex: 1; padding: 10px;">
            <h4>บริการ</h4>
            <ul style="list-style-type: none; padding: 0;">
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">ตรวจวัดสายตา</a></li>
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">ปรับแต่งกรอบ</a></li>
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">การรับประกันสินค้า</a></li>
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">วิธีสั่งซื้อ</a></li>
            </ul>
        </div>

        <!-- ติดต่อเรา -->
        <div style="flex: 1; padding: 10px;">
            <h4>ติดต่อเรา</h4>
            <ul style="list-style-type: none; padding: 0;">
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">Facebook</a></li>
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">Line</a></li>
                <li><a href="#" style="color: #fff; opacity: 0.8; text-decoration: none;">TikTok</a></li>
            </ul>
        </div>
    </div>

    <!-- ข้อความ Copyright -->
    <div style="text-align: center; padding-top: 20px; font-size: 0.9rem; border-top: 1px solid rgba(255, 255, 255, 0.3);">
        © 2025 Banwaenraikhing Optical. All rights reserved.
    </div>
</footer>


    <script>
        function openModal(src){
            const modal = document.getElementById("imgModal");
            const modalImg = document.getElementById("modalImg");
            modal.style.display = "flex";   
            modalImg.src = src;
        }

        function closeModal(){
            document.getElementById("imgModal").style.display = "none"; 
        }
        // ฟังก์ชันกรองสินค้าตามหมวดหมู่
    function filterCategory(category) {
        // หาสินค้าทั้งหมด
        const allProducts = document.querySelectorAll('.product');
        
        // เปลี่ยนสถานะ active ของปุ่มหมวดหมู่
        const categoryTabs = document.querySelectorAll('.category-tab');
        categoryTabs.forEach(tab => tab.classList.remove('active'));
        event.target.classList.add('active');
        
        // กรองสินค้าและแสดงสินค้าที่ตรงกับหมวดหมู่
        allProducts.forEach(product => {
            if (category === 'ทั้งหมด' || product.getAttribute('data-category') === category) {
                product.style.display = 'block'; // แสดงสินค้า
            } else {
                product.style.display = 'none'; // ซ่อนสินค้า
            }
        });
    }
    </script>


</body>
</html>

