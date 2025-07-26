<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charmed Chews</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #e0e7ff;
            padding: 40px 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2.5rem;
            color: #1e1e1e;
        }
        header p {
            color: #555;
            margin-top: 10px;
        }
        nav {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        nav .logo {
            font-weight: bold;
            color: #5b21b6;
        }
        nav .admin-btn {
            background-color: #5b21b6;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
        }
        .section-title {
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .products {
            display: flex;
            gap: 20px;
            padding: 0 20px 40px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden;
            width: 280px;
        }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .card-content {
            padding: 16px;
        }
        .card-content h3 {
            margin: 0 0 8px;
        }
        .card-content p {
            margin: 0 0 8px;
            color: #555;
        }
        .card-content .price {
            font-weight: bold;
            color: #4f46e5;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">Charmed Chews</div>
        <a href="/admin" class="admin-btn">Admin Panel</a>
    </nav>
    <header>
        <h1>Welcome to Charmed Chews</h1>
        <p>Landing page <strong>Charmed Chews</strong> adalah halaman utama dari situs web toko kue dan makanan manis <em>Charmed Chews</em>. Halaman ini menampilkan produk-produk terbaru dan makanan yang sedang dalam promo spesial, yang bisa diakses oleh siapa pun secara online melalui internet.</p>
    </header>
    <section>
        <div class="section-title">Promo & New Products</div>
        <div class="products">
            <div class="card">
                <img src="/images/macaron.jpg" alt="Macaron">
                <div class="card-content">
                    <h3>Macaron</h3>
                    <p>Sweet Rainbow Macaron</p>
                    <div class="price">Rp 40.000</div>
                </div>
            </div>
            <div class="card">
                <img src="/images/mudcake.jpg" alt="Mud Cake">
                <div class="card-content">
                    <h3>Mud Cake</h3>
                    <p>Yummy and Chummy Mud Cake with a leaf on the top</p>
                </div>
            </div>
            <div class="card">
                <img src="/images/chocolate.jpg" alt="Chocolate Bar">
                <div class="card-content">
                    <h3>Chocolate Bar</h3>
                    <p>Yummy Chocolate Bar</p>
                    <div class="price">Rp 100.000</div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
