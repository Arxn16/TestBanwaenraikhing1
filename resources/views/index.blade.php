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
      --brand:#000033;        /* หลัก */
      --brand-600:#000033;    /* สีค้นหา */
      --brand-700:#000033;    
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
    .slide .left{background:#5e3b2e; color:#fff; padding:40px 36px; display:flex; align-items:center}
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

    /* Footer */
    footer{
      margin-top:36px; 
      background:#000033; 
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
              <span style="opacity:.85">Exclusive</span>
              <h1>Home Decor</h1>
              <p>เนรมิตบ้านให้อบอุ่น ด้วยของตกแต่งบ้านจาก Cozy Maison</p>
              <button class="cta">ช้อปเลย</button>
            </div>
          </div>
          <div class="right">
            <img src="https://images.unsplash.com/photo-1503602642458-232111445657?q=80&w=1740&auto=format&fit=crop" alt="Dining room" />
          </div>
        </article>
        <!-- Slide 2 -->
        <article class="slide">
          <div class="left" style="background:#3b3b6d">
            <div class="inner">
              <span style="opacity:.85">New Arrival</span>
              <h1>แฟชั่นรับหน้าฝน</h1>
              <p>กันน้ำ เบาสบาย สไตล์มินิมอล คอลเลกชันใหม่ล่าสุด</p>
              <button class="cta">ดูคอลเลกชัน</button>
            </div>
          </div>
          <div class="right">
            <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1740&auto=format&fit=crop" alt="Fashion" />
          </div>
        </article>
        <!-- Slide 3 -->
        <article class="slide">
          <div class="left" style="background:#6b3b3b">
            <div class="inner">
              <span style="opacity:.85">Member Deal</span>
              <h1>ส่วนลดสูงสุด 40%</h1>
              <p>สำหรับสมาชิกใหม่ ใช้ได้กับหมวด Home และ Beauty</p>
              <button class="cta">สมัครสมาชิก</button>
            </div>
          </div>
          <div class="right">
            <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?q=80&w=1740&auto=format&fit=crop" alt="Home plant" />
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
      <h2 style="margin:0">สินค้าแนะนำ</h2>
      <div class="filters" id="catFilters"></div>
      <select class="select-sm" id="catSelect"></select>
    </div>

    <div class="grid" id="productGrid"></div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div>
        <h4>Banvanraikhing</h4>
        <p>แพลตฟอร์มช้อปปิ้งที่คัดสรรสินค้าเพื่อคุณอย่างใส่ใจ ส่งเร็ว ราคาเป็นมิตร</p>
      </div>
      <div>
        <h4>หมวดหมู่</h4>
        <a href="#">เสื้อผ้า</a>
        <a href="#">รองเท้า</a>
        <a href="#">กระเป๋า</a>
        <a href="#">ของตกแต่งบ้าน</a>
      </div>
      <div>
        <h4>ช่วยเหลือ</h4>
        <a href="#">วิธีสั่งซื้อ</a>
        <a href="#">การชำระเงิน</a>
        <a href="#">ติดตามพัสดุ</a>
        <a href="#">คืนสินค้า</a>
      </div>
      <div>
        <h4>ติดต่อเรา</h4>
        <a href="#">Facebook</a>
        <a href="#">Line</a>
        <a href="#">TikTok</a>
      </div>
    </div>
    <div class="copyright">© 2025 GoMart. All rights reserved.</div>
  </footer>

  <script>
    // Mobile nav toggle
    function toggleNav(){
      document.getElementById('nav').classList.toggle('open');
    }

    // Simple slider
    const slides = document.getElementById('slides');
    const slider = document.getElementById('slider');
    const dotsWrap = document.getElementById('dots');
    let index = 0; let total = slides.children.length; let timer;

    function setDots(){
      dotsWrap.innerHTML = '';
      for(let i=0;i<total;i++){
        const d = document.createElement('span');
        d.className = 'dot' + (i===index?' active':'');
        d.onclick = ()=>{ index=i; update(); resetAuto(); };
        dotsWrap.appendChild(d);
      }
    }
    function update(){
      slides.style.transform = `translateX(-${index*100}%)`;
      setDots();
    }
    function nextSlide(){ index = (index+1)%total; update(); }
    function prevSlide(){ index = (index-1+total)%total; update(); }
    function auto(){ timer = setInterval(nextSlide, 5000); }
    function resetAuto(){ clearInterval(timer); auto(); }

    // Init slider
    setDots(); auto();
    slider.addEventListener('mouseenter', ()=>clearInterval(timer));
    slider.addEventListener('mouseleave', resetAuto);

    /* ===== Products data (ตัวอย่าง) ===== */
    const PRODUCTS = [
      {id:1, name:'Penne Rigate', cat:'Breakfast', img:'https://www.facebook.com/photo.php?fbid=776717525105235&set=pb.100083009838483.-2207520000&type=3', priceOld:59, priceNew:49, off:17, rating:4},
      {id:2, name:'Beef Steak', cat:'Cooking', img:'https://images.unsplash.com/photo-1603048297172-c92544798c53?q=80&w=1200&auto=format&fit=crop', priceOld:59, priceNew:49, off:17, rating:5},
      {id:3, name:'Coconut', cat:'Fruits', img:'https://images.unsplash.com/photo-1501290836517-b22a21c3dd2c?q=80&w=1200&auto=format&fit=crop', priceOld:59, priceNew:49, off:17, rating:4},
      {id:4, name:'Pasta Pack', cat:'Breakfast', img:'  ', priceOld:59, priceNew:49, off:17, rating:4},
      {id:5, name:'Pineapple', cat:'Fruits', img:'   ', priceOld:59, priceNew:49, off:17, rating:5},
      {id:6, name:'Bananas', cat:'Fruits', img:'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?q=80&w=1200&auto=format&fit=crop', priceOld:59, priceNew:49, off:17, rating:4},
      {id:7, name:'White Wine', cat:'Beverage', img:'https://images.unsplash.com/photo-1544126595-9de0bd7bb9b7?q=80&w=1200&auto=format&fit=crop', priceOld:59, priceNew:49, off:17, rating:3},
      {id:8, name:'Olive Oil', cat:'Cooking', img:'   ', priceOld:59, priceNew:49, off:17, rating:5},
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
            <img src="${p.img}" alt="${p.name}">
            ${p.off ? `<span class="badge">-${p.off}%</span>`:''}
            <button class="wish" title="เพิ่มรายการโปรด">♡</button>
          </div>
          <div class="body">
            <div class="catname">${p.cat}</div>
            <div class="pname">${p.name}</div>
            <div class="rating" aria-label="rating ${p.rating} stars">${'★'.repeat(p.rating)}${'☆'.repeat(5-p.rating)}</div>
            <div class="price">
              <span class="old">$${p.priceOld.toFixed(2)}</span>
              <span class="new">$${p.priceNew.toFixed(2)}</span>
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
  </script>
</body>
</html>
