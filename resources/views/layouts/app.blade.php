<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Manager - Laravel</title>
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .main-nav {
            background: #ffffff;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .nav-left {
            display: flex;
            gap: 25px;
        }
        .nav-right {
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        .main-nav a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.2s;
        }
        .main-nav a:hover, .main-nav a.active {
            color: #2563eb;
        }

        /* =========================================
           CSS UNTUK DROPDOWN PROFILE
           ========================================= */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropbtn {
            background-color: transparent;
            color: #374151;
            font-size: 15px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px;
            border-radius: 6px;
            transition: background-color 0.2s;
        }
        .dropbtn:hover {
            background-color: #f3f4f6;
        }
        .dropdown-content {
            display: none; 
            position: absolute;
            right: 0; 
            top: 100%; /* Ini yang membuat menunya menempel dan tidak kabur */
            background-color: #ffffff;
            min-width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.1);
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            z-index: 1;
            overflow: hidden;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a, .dropdown-content button {
            color: #374151;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            width: 100%;
            text-align: left;
            border: none;
            background: none;
            font-family: inherit;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            box-sizing: border-box;
            transition: background-color 0.2s;
        }
        .dropdown-content a:hover, .dropdown-content button:hover {
            background-color: #f9fafb;
        }
        .text-green { color: #059669 !important; }
        .text-red { color: #dc2626 !important; }
    </style>
</head>
<body>

    <!-- Menu Navigasi Atas -->
    <div class="main-nav">
        <!-- Menu Kiri -->
        <div class="nav-left">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products*') ? 'active' : '' }}">Daftar Produk</a>
            <a href="{{ route('transactions.index') }}" class="{{ request()->routeIs('transactions*') ? 'active' : '' }}">Transaksi Barang</a>
        </div>

        <!-- Menu Kanan (Dropdown Profile) -->
        <div class="nav-right">
            <div class="dropdown">
                <!-- Tombol Utama Profile -->
                <button class="dropbtn">
                    <span>Halo, <b>{{ Auth::user()->name ?? 'Pengguna' }}</b></span>
                    <span style="font-size: 10px;">▼</span>
                </button>
                
                <!-- Isi Dropdown yang tersembunyi -->
                <div class="dropdown-content">
                    <a href="{{ route('password.change') }}" class="text-green">Ganti Password</a>
                    
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="text-red">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tempat Konten Halaman Dirender -->
    <main style="padding: 0 30px;">
        @yield('content')
    </main>

</body>
</html>