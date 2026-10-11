<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    
    <!-- Memanggil style.css dari folder public -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav style="padding: 15px; background: #f3f4f6; margin-bottom: 20px;">
        <a href="{{ route('dashboard') }}" style="margin-right: 15px;">Dashboard</a>
        <a href="{{ route('products.index') }}">Daftar Produk</a>
    </nav>

    <main style="padding: 0 20px;">
        <!-- Konten dinamis akan dimuat di sini -->
        @yield('content')
    </main>
</body>
</html>