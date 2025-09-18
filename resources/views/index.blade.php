<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Banvanraikhing Homepage</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root{
      --brand:#004d40;        /* หลัก */
      --brand-600:#004d40;    /* สีค้นหา */
      --brand-700:#004d40;    
      --text:#1e293b;         /* เทาเข้ม */
      --muted:#64748b;        /* เทากลาง */
      --bg:#f6f7f9;           /* พื้นหลัง */
      --card:#ffffff;         /* บัตร */
      --radius:18px;
      --shadow:0 10px 25px rgba(0,0,0,.07);
      --content-width: 1100px; /* ✅ กำหนดความกว้างคอนเทนต์หลักให้ทั้งสไลด์และกริดใช้ร่วมกัน */
    }
    *{box-sizing:border-box}
    html,body{margin:0; padding:0; font-family:"Prompt",system-ui,-apple-system,Segoe UI,Roboto; color:var(--text); background:var(--bg)}
    a{color:inherit; text-decoration:none}
    img{max-width:100%; display:block}
    .container{max-width:1200px; margin:0 auto; padding:0 20px}

    /* Top utility bar */
    .topbar{background:var(--brand); color:#fff; font-size:.92rem}
    .topbar .container{display:flex; align-items:center; justify-content:space-between; min-height:44px}
    .topbar .info{display:flex; gap:14px; align-items:center}
    .topbar i{font-style:normal; opacity:.9}
    .topbar .social{display:flex; gap:12px}

    /* Header / nav */
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

    /* Hero slider */
    .hero{margin-top:18px}
    .slider{
      position:relative; border-radius:var(--radius); overflow:hidden; background:#ddd; box-shadow:var(--shadow);
      /* ✅ ทำให้สไลด์กว้างเท่ากับ content-width และจัดกึ่งกลาง */
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

    .slider .nav{position:absolute; inset:0; pointer-events:none}
    .arrow{position:absolute; top:50%; transform:translateY(-50%); width:42px; height:42px; border-radius:12px; background:rgba(255,255,255,.9); border:0; display:grid; place-items:center; box-shadow:0 6px 20px rgba(0,0,0,.12); pointer-events:auto; cursor:pointer}
    .arrow.left{left:16px}
    .arrow.right{right:16px}
    .dots{position:absolute; left:0; right:0; bottom:14px; display:flex; gap:8px; justify-content:center}
    .dot{width:10px;height:10px;border-radius:999px;background:rgba(255,255,255,.7);border:2px solid rgba(0,0,0,.06)}
    .dot.active{background:#fff}

    /* ===== Categories (Products) ===== */
    .section{margin:28px 0}
    .section .head{
      max-width: var(--content-width);
      margin: 0 auto 14px;
      display:flex; align-items:center; justify-content:space-between; gap:12px;
    }
    .filters{display:flex; gap:8px; flex-wrap:wrap}
    .pill{
      padding:8px 12px; border-radius:999px; background:#eef2f7; color:#0f172a;
      font-weight:600; font-size:.92rem; cursor:pointer; border:1px solid rgba(0,0,0,.04)
    }
    .pill.active{ background:#dbeafe; border-color:#bfdbfe }
    .select-sm{display:none}
    @media (max-width:640px){ .filters{display:none} .select-sm{display:block; width:100%} }

    /* grid: ใช้กริด 12 คอลัมน์ที่มีอยู่แล้ว */
    .grid{ max-width: var(--content-width); margin:0 auto; display:grid; grid-template-columns:repeat(12,1fr); gap:18px }

    /* Product card */
    .product{ grid-column:span 3; background:var(--card); border-radius:16px; overflow:hidden; box-shadow:var(--shadow); position:relative }
    @media (max-width:900px){ .product{ grid-column:span 4 } }
    @media (max-width:640px){ .product{ grid-column:span 12 } }

    .product .thumb{ position:relative; background:#fff; display:grid; place-items:center; height:180px }
    .product .thumb img{ width:100%; height:100%; object-fit:contain; padding:10px }
    .badge{
      position:absolute; left:10px; top:10px; font-size:.78rem; font-weight:700;
      background:#ef4444; color:#fff; padding:4px 8px; border-radius:8px;
    }
    .wish{ position:absolute; right:10px; top:10px; width:32px; height:32px; border-radius:10px; display:grid; place-items:center; background:#f1f5f9 }

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

    .product .thumb {
        position: relative;
        background: #fff;
        display: grid;
        place-items: center;
        height: 200px;   /* ความสูงกรอบรูปคงที่ */
        overflow: hidden;
      }

      .product .thumb img {
        width: 100%;
        height: 100%;
        object-fit: contain;  /* ทำให้รูปไม่ถูกครอบ/บิด */
        cursor: pointer;      /* มี pointer เวลา hover */
      }


    /* Footer */
    footer{
      margin-top:36px; 
      background:#004d40; 
      color:#e2e8f0}
    footer .container{
      display:grid; 
      grid-template-columns:2fr 1fr 1fr 1fr; 
      gap:24px; 
      padding:36px 20px}
    footer h4{
      margin:0 0 10px; 
      color:#fff}
    footer a{
      display:block; 
      opacity:.9; 
      margin:6px 0}
    .copyright{
      border-top:1px solid rgba(255,255,255,.08); 
      padding:12px 0; 
      font-size:.9rem; 
      text-align:center}


       /* ===== Modal สำหรับแสดงรูป ===== */
.img-modal {
  display: none; /* เริ่มต้นต้อง none */
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


    /* Responsive */
    .hamburger{display:none}
    @media (max-width:1000px){
      .nav{flex-wrap:wrap}
      .navlinks{order:3; width:100%; overflow:auto; white-space:nowrap}
      .searchbar{order:2; width:100%}
    }
    @media (max-width:820px){
      .slide{grid-template-columns:1fr}
      .slide .left{min-height:240px}
      footer .container{grid-template-columns:1fr 1fr}
    }
    @media (max-width:640px){
      .hamburger{display:block}
      .navlinks{display:none; width:100%; background:#fff; border-radius:12px; padding:8px; box-shadow:var(--shadow)}
      .nav.open .navlinks{display:flex}
      .searchbar form{max-width:none}
      .col-3{grid-column:span 6}
      .col-6{grid-column:span 12}
      footer .container{grid-template-columns:1fr}
    }
  

    /* ===== Header tidy overrides (desktop) ===== */
    @media (min-width:1001px){
      header .container{ padding-left:8px; }
      .nav{
        display:grid;                           /* brand | links | search */
        grid-template-columns:auto 1fr auto;
        align-items:center;
        column-gap:16px;
      }
      .brand{ gap:8px; }
      .navlinks{
        display:flex; gap:14px; flex-wrap:nowrap; min-width:0;
      }
      .navlinks a{ white-space:nowrap; }
      .searchbar{
        justify-self:end; margin-left:0; width:min(560px,44vw); flex:none;
      }
      .searchbar form{ width:100%; max-width:none; }
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
      <a class="brand" href="#"><span class="logo"></span>Banvanraikhing</a>
      <button class="hamburger iconbtn" aria-label="menu" onclick="toggleNav()">☰</button>

      <nav class="navlinks" id="links">
        <a href="#">Categories ▾</a>
        <a href="#">โปรโมชั่น</a>
        <a href="#">บทความ</a>
        <a href="#">ติดต่อ</a>
        <a href="#">ร่วมงานกับเรา</a>
      </nav>

      <div class="searchbar">
        <form onsubmit="event.preventDefault()">
          <input type="search" placeholder="ค้นหาสินค้า" aria-label="ค้นหา" />
          <button>ค้นหา</button>
        </form>
        <div class="icons">
          <a class="iconbtn" href="#" aria-label="search">🔍</a>
          <a class="iconbtn" href="#" aria-label="cart">🛒</a>
          <a class="iconbtn" href="#" aria-label="account">👤</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Hero Slider -->
  <section class="hero container">
    <div class="slider" id="slider">
      <div class="slides" id="slides">
        <!-- Slide 1 -->
        <article class="slide">
          <div class="left">
            <div class="inner">
              <span style="opacity:.85">ตัดแว่นงบประหยัด</span>
              <h1>NEW ARRIVALS</h1>
              <p>กรอบแว่นตาแฟชั่นสวยงาม แข็งแรง พร้อมเลนส์ <br> เริ่มต้น 990, 1290, 1690 บาท จ่ายราคานี้จ่ายจริง ราคานี้ได้อะไรบ้าง ?<br>
                  -ทำค่าสายตาได้ { สั้น-6.00|ยาว+6.00} {เอียง-4.00}<br>
                  -เลนส์กรองแสง Multicoat 1.56<br>
                  -เลนส์ตัดแสงสีฟ้า Blue block 1.56 <br>
                  -เลนส์ออกแดดเปลี่ยนสีอัติโนมัติ Photo 1.56<br>
                  -เลนส์ตัดแสงสีฟ้าออกแดดเปลี่ยนสีอัตโนมัติ Photp Blue 1.56 <br>
                  -ตรวจวัดสายตาฟรีด้วยระบบคอมพิวเตอร์<br>
                  -บริการจัดส่งสินค้าฟรี📌<br>
                  -มีอุปกรณ์แถมครบกล่อง</p>
              <button class="cta">ช้อปเลย</button>
            </div>
          </div>
          <div class="right">
            <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/540713088_763082599802061_4300738556788519853_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=106&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeG0gEpl5rouIN-T_ZucfekcR1-abso_Ct1HX5puyj8K3U3o9IYDbjjd-bjG8nCEa5C8beHtfvfTSWz6tIWLXqUW&_nc_ohc=a_NQ7KO4EMUQ7kNvwG8MAVW&_nc_oc=AdkSv2MHIr_0fQc1tlekfOtHdpoDF7wH9_EWEjjnJfdLtFBmmer6VKGHb_b3FS4asi0&_nc_zt=23&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=TxiMHEXJUDWhe-SuI-1Pqg&oh=00_Afb7UwERySiQppH5IGZDdJkDtvXEY9lv9YVPrYt3XN31Yw&oe=68D1D1BC" alt="Dining room" />
          </div>
        </article>
        <!-- Slide 2 -->
        <article class="slide">
          <div class="left" style="background:#3b3b6d">
            <div class="inner">
              <span style="opacity:.85">BELON</span>
              <h1> BELON B-TITANIUM IP รุ่น 5299 สี SILVER</h1>
              <p>กล่องแว่นตาจากแบรนด์ BELON+ผ้าเช็ดเลนส์ <br>
                 -ผ้าเช็ดเลนส์พรีเมี่ยมจาก HOYA <br>
                 -น้ำยาทำความสะอาดเลนส์</p> 
              <button class="cta">ดูคอลเลกชัน</button>
            </div>
          </div>
          <div class="right">
            <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/538139996_756024113841243_6197612905239313754_n.jpg?stp=cp6_dst-jpegr_tt6&_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFmkfTCVB7WCLXbC0jSx-uBe7Uj6Od8TgF7tSPo53xOAQptQxVNv2YnHIq2WTOmd1iA40Jk8YAE_JxoNpU_3FLB&_nc_ohc=0jvlRmHXLeUQ7kNvwFP1vRF&_nc_oc=AdlXWzKPmYPPainglRifue9u0mLgn5nB_EpTXzLyEHLXyDnkahR71yuW_fJ9qNPSWnc&_nc_zt=23&se=-1&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=GInwPE9DAMEAp1CD7NTH4w&oh=00_Afa-droMaRroXQugKokrNCU0WgWx1o2blIFdJIe6YaiNhA&oe=68D1B79A" alt="Fashion" />
          </div>
        </article>
        <!-- Slide 3 -->
        <article class="slide">
          <div class="left" style="background:#6b3b3b">
            <div class="inner">
              <span style="opacity:.85">Saturday tip</span>
              <h1> Blue Control</h1>
              <p>POLO FRANK 456, POLO SPORT 451 +1.6 HOYA STELLIFY SV BLUE CONTROL HV</p>
              <button class="cta">สมัครสมาชิก</button>
            </div>
          </div>
          <div class="right">
            <img src="https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/509359928_706810725429249_6320299717422731806_n.jpg?stp=cp6_dst-jpegr_tt6&_nc_cat=101&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEPcXGtA2L7eeMpnXCa3xQCYJ3opBWK2h5gneikFYraHv8Szta7ALUFOAJ5uvwGEA20BJb6y_7r1sgM_2cPanA9&_nc_ohc=VfDLoQUHgjUQ7kNvwGUzFfx&_nc_oc=AdkgopjHp7QOJD5sdErULjNa_MReguzO1Ni6vMKJ3uVzYgAuG9oSRJwBEC19Gi2F8tY&_nc_zt=23&se=-1&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=IjvHnHuNu1P7PHlXjom6LQ&oh=00_Afb534PsM8hmuY1KcmcUwgrtc1eNsOgF5uqYaS9StUQsTQ&oe=68D1CA04" alt="Home plant" />
          </div>
        </article>
      </div>
      <div class="nav">
        <button class="arrow left" aria-label="ก่อนหน้า" onclick="prevSlide()">❮</button>
        <button class="arrow right" aria-label="ถัดไป" onclick="nextSlide()">❯</button>
        <div class="dots" id="dots"></div>
      </div>
    </div>
  </section>

 <!-- Categories -->
<section class="section">
  <div class="head">
    <h2 style="margin:0">แว่นตาแนะนำ</h2>
    <div class="filters" id="catFilters"></div>
    <select class="select-sm" id="catSelect"></select>
  </div>

  <div class="grid" id="productGrid"></div>

  <!-- Modal สำหรับแสดงรูป -->
<div id="imgModal" class="img-modal">
  <span class="close" onclick="closeModal()">×</span>
  <img class="modal-content" id="modalImg">
</div>

</section>

<!-- Footer -->
<footer>
  <div class="container">
    <div>
      <h4>Banvanraikhing Optical</h4>
      <p>ศูนย์รวมแว่นตาแฟชั่นและสายตา เลนส์คุณภาพสูง  
         บริการวัดสายตาโดยผู้เชี่ยวชาญ พร้อมโปรโมชั่นพิเศษตลอดปี</p>
    </div>
    <div>
      <h4>หมวดหมู่</h4>
      <a href="#">แว่นสายตา</a>
      <a href="#">แว่นกันแดด</a>
      <a href="#">เลนส์เสริม</a>
      <a href="#">อุปกรณ์ดูแลเลนส์</a>
    </div>
    <div>
      <h4>บริการ</h4>
      <a href="#">ตรวจวัดสายตา</a>
      <a href="#">ปรับแต่งกรอบ</a>
      <a href="#">การรับประกันสินค้า</a>
      <a href="#">วิธีสั่งซื้อ</a>
    </div>
    <div>
      <h4>ติดต่อเรา</h4>
      <a href="#">Facebook</a>
      <a href="#">Line</a>
      <a href="#">TikTok</a>
    </div>
  </div>
  <div class="copyright">© 2025 Banvanraikhing Optical. All rights reserved.</div>
</footer>

<script>
  /* ===== Products data (เกี่ยวกับร้านแว่นตา) ===== */
  const PRODUCTS = [
    {id:1, name:'กรอบแว่น POLO SPORT 210255+1.5', cat:'แว่นสายตา', img:'https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/534884588_752610990849222_130839009848508718_n.jpg?stp=cp6_dst-jpegr_tt6&_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeF8WH0LLWuOPwgwqI7kUaAzxcaDBUGK41vFxoMFQYrjW_GIiSxhQ6-WT-TV-b1DCwAWVSfdnZTcdGD8Z_-NMb_Q&_nc_ohc=Mb9ruKHOTsoQ7kNvwF0COd7&_nc_oc=AdmRdt3dBb9d6dPLNDb_4qD6k_PFANDO7VVKfsn4nC5ap6NGFCc7jX404D4no99LCec&_nc_zt=23&se=-1&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=nBB1dYeMvodlD3GUJAWcxA&oh=00_AfY4YjCp5nkTpB5MjJVpxHT0l-mmEuLW2Ni3VkFaT4g4CA&oe=68D1D145', priceOld:2990, priceNew:1990, off:33, rating:5},
    {id:2, name:'กรอบแว่น OAKLEY', cat:'แว่นกันแดด', img:'https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/513929468_715371634573158_5291643583269684712_n.jpg?stp=cp6_dst-jpegr_tt6&_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFqofblMuqxhQy2eCMQz_rtXGlRxuqTmytcaVHG6pObK1BJR6SHCi0XP_CI7oq0MH7XpI3KIgBdHAC1an0pCMo2&_nc_ohc=Ovfs23F_bTcQ7kNvwFYzZUb&_nc_oc=AdnEsMeXdLtmZS-atJR9qQ5xd56Nrv8_OJcZn-WnGNPDHAGyyRp6hcJUGt6ijpoAzxo&_nc_zt=23&se=-1&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=6fRFcbTjVr5sn3rXAJu6Ww&oh=00_AfYX7VtZfIwufZVMAv0pitN9cjiKeNJ4SuIaTIJ5xsSTtA&oe=68D1D45F', priceOld:2590, priceNew:1890, off:27, rating:4},
    {id:3, name:'เลนส์ HOYA RX.PROGRESSIVE AMPLITUDE PLUS HVP', cat:'เลนส์เสริม', img:'https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/535034117_752610297515958_349207101242717371_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGizcYa6M4070QZ4KUZ8oDkHvMjgynWIXge8yODKdYheLy8jtEFPe5CKjrBoxfp854RCynYGp7NjHcqbj7dzoDI&_nc_ohc=XAKC12EOmvEQ7kNvwE0QV59&_nc_oc=AdnHZs5E_FTB379f2O_cUrMgxYCxtgTCGgS-ZrcoAt37WgaNDuSDbUSETu8FjgbWvmA&_nc_zt=23&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=gbFUIbcPuEqU6bPZy76K5g&oh=00_AfaIYJwPPuKZVveW7jswUtecsog7Pqajuh9AftuTUrZb_g&oe=68D1E64B', priceOld:3500, priceNew:2800, off:20, rating:5},
    {id:4, name:'กรอบแว่น LECOOL 17287 +1.6 ASPHERIC PHOTOCHRIMIC GRAY BLUE BLOCK HMC UV ', cat:'แว่นสายตา', img:'https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/547724406_777510385025949_2656713585378945732_n.jpg?stp=cp6_dst-jpegr_tt6&_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFBHWPwDdBU_wU8DwKfjrmXpSRn4BZOAd6lJGfgFk4B3s8C9yObKXlUtL_slrqlKSuc5Y14PLqpD7HiZl4YSTzf&_nc_ohc=SRyT9ulWI_0Q7kNvwFRvbub&_nc_oc=AdmuIeOsR61J0C6lPMrQwyD63bTJ-SR-X45SU3l0MWb-9GxtmBfFcpEchMHuA0JdWTs&_nc_zt=23&se=-1&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=sv_5jAVVVBphoEBgvV4TJw&oh=00_AfZRPtUortXLhcCxQKhaKtUfcVxcs3xwvcaRgSAeJswNiw&oe=68D1C980', priceOld:4590, priceNew:3590, off:22, rating:4},
    {id:5, name:'น้ำยาทำความสะอาดเลนส์ HITOP Spray Cleaner', cat:'อุปกรณ์ดูแลเลนส์', img:'https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/483525801_632515446192111_8250301211301692581_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEjLFFpf0ARLZxrvd4YyfEm4AKsM8cT4zngAqwzxxPjOZ2IJIz7TZvVx7XYO8dDFM-IPaA3pGrI5buz0u9qwhsy&_nc_ohc=dMRakflbl0YQ7kNvwH6iH3r&_nc_oc=AdngJVKapixIR8pnQ9-uD0Hbs2KeN6TWDtB-e6s8lfIMvB5v2ZN0gn07oIWZA5YjcYA&_nc_zt=23&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=DWhtCuK0Ykfcvd8r3oEVmg&oh=00_AfbxUrTRQsS01yGF0B-cP3ASIKYoV3eTodFLz0JhI0fJUQ&oe=68D1E4C8', priceOld:390, priceNew:290, off:25, rating:5},
    {id:6, name:'แว่นกันแดด RAY- BAN', cat:'แว่นกันแดด', img:'https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/511023802_706758782101110_281228103071575830_n.jpg?stp=cp6_dst-jpegr_tt6&_nc_cat=100&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEXGzW346fbG1U5guGpy5rW0d-9flhqmwjR371-WGqbCB4wUX8Dl-f--8R_zsbiTAhbYDRSow3gVPZRUfat486U&_nc_ohc=_FsCNHXFpFAQ7kNvwE1X7a8&_nc_oc=AdnG-4xiH0gu1fIK4wngBpzBqsKxiWgbNDWeSAZqkCU5xd-BHreeA7ziST-ukhrpmWI&_nc_zt=23&se=-1&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=t8faxsxoGaf8YYkhyE6G6A&oh=00_AfYHTNsW5tlGwNIyStNf8ehQq4nCFo5BPMmqVXsKIEmi7g&oe=68D200EC', priceOld:1990, priceNew:1490, off:25, rating:4},
    {id:7, name:'เลนส์ ', cat:'เลนส์เสริม', img:'https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/484815069_635928492517473_4868456979949379896_n.jpg?stp=cp6_dst-jpegr_tt6&_nc_cat=102&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGfAi5g70WUXFZA3AC1u5_eSLSZ9a4KUm5ItJn1rgpSbupD2AkXOUJoELCaFmaEqx3AZMAvhn9_rQ8mXPqKDZT8&_nc_ohc=Z11oDhEgV2cQ7kNvwGDuwg7&_nc_oc=AdndDdQCoPfJFidw1U_GBqCVcF5kAoQzVkLfZgs2bBRw_d-Gi6Coh9tpQ3nBJxNl38I&_nc_zt=23&se=-1&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=cBOUSHwLL8TVhLf5udDxJg&oh=00_Afa-xdHDkz_tVmiodsTDAZE3pKgDx3FttC5VBtI5p4QCeg&oe=68D1DB63', priceOld:4800, priceNew:3990, off:17, rating:5},
    {id:8, name:'POLO SPORT TB5760 C2', cat:'กรองเเสง', img:'https://scontent.fkkc3-1.fna.fbcdn.net/v/t39.30808-6/548200658_776705305106457_4224112404229378485_n.jpg?stp=cp6_dst-jpegr_tt6&_nc_cat=104&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHL2koDBxR-uIUU2YxosO5Jy6NKy1rTqezLo0rLWtOp7OPyYm9SqD1pJdTdJspHrx5umK6kxn_qUWqwUyZ6aSFe&_nc_ohc=hQ_NzHcy62gQ7kNvwEw9wg4&_nc_oc=Adkgxehb8Cwxo5cEynf4ZUpq2P643iLCPTDGb0op4Q_NSqHM23NzuCdn1VeD46lzs3c&_nc_zt=23&se=-1&_nc_ht=scontent.fkkc3-1.fna&_nc_gid=w3NKNZMqNSDJ_FO4ZLL4Mg&oh=00_AfZ9niajYQFvQh6P7O77FTiLuDvyoQpnpGktyvrcvy70dw&oe=68D1EFC0', priceOld:1890, priceNew:1290, off:31, rating:4},
  ];

  const grid = document.getElementById('productGrid');
  const filters = document.getElementById('catFilters');
  const select = document.getElementById('catSelect');

  const cats = ['ทั้งหมด', ...Array.from(new Set(PRODUCTS.map(p => p.cat)))];

  function renderFilters(active = 'ทั้งหมด'){
    filters.innerHTML = '';
    cats.forEach(c => {
      const b = document.createElement('button');
      b.type = 'button';
      b.className = 'pill' + (c===active?' active':'');
      b.textContent = c;
      b.onclick = () => { renderProducts(c); renderFilters(c); select.value = c; };
      filters.appendChild(b);
    });

    // mobile dropdown
    select.innerHTML = cats.map(c => `<option value="${c}">${c}</option>`).join('');
    select.value = active;
    select.onchange = e => { renderProducts(e.target.value); renderFilters(e.target.value); };
  }

  function productCard(p){
  return `
    <article class="product card">
      <div class="thumb">
        <img src="${p.img}" alt="${p.name}" onclick="openModal('${p.img}')">
        ${p.off ? `<span class="badge">-${p.off}%</span>`:''}
        <button class="wish" title="เพิ่มรายการโปรด">♡</button>
      </div>
      <div class="body">
        <div class="catname">${p.cat}</div>
        <div class="pname">${p.name}</div>
        <div class="rating" aria-label="rating ${p.rating} stars">
          ${'★'.repeat(p.rating)}${'☆'.repeat(5-p.rating)}
        </div>
        <div class="price">
          <span class="old">฿${p.priceOld.toLocaleString()}</span>
          <span class="new">฿${p.priceNew.toLocaleString()}</span>
        </div>
      </div>
      <div class="actions">
        <button class="btn-sm">เพิ่มลงตะกร้า</button>
        <button class="btn-sm" style="background:#0ea5e9">ดูสินค้า</button>
      </div>
    </article>
  `;
}


  function renderProducts(cat='ทั้งหมด'){
    const list = cat==='ทั้งหมด' ? PRODUCTS : PRODUCTS.filter(p => p.cat===cat);
    grid.innerHTML = list.map(productCard).join('');
  }

  // init products
  renderFilters();
  renderProducts();

  // ===== Modal Functions =====
function openModal(src){
  const modal = document.getElementById("imgModal");
  const modalImg = document.getElementById("modalImg");
  modal.style.display = "flex";   // ✅ กำหนด flex ตอนเปิด
  modalImg.src = src;
}

function closeModal(){
  document.getElementById("imgModal").style.display = "none"; // ปิด modal
}

let index = 0; 
const slides = document.getElementById('slides');
const total = slides.children.length;

function update(){
  slides.style.transform = `translateX(-${index*100}%)`;
  setDots();
}
function nextSlide(){ index = (index+1) % total; update(); }
function prevSlide(){ index = (index-1+total) % total; update(); }


</script>

</body>
</html>
