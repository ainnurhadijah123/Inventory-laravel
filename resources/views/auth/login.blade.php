<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Product Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body style="background-color: #f3f4f6; height: 100vh; display: flex; justify-content: center; align-items: center; margin: 0; font-family: 'Poppins', sans-serif;">

    <div style="background: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); width: 100%; max-width: 350px; text-align: center;">
        <h2 style="margin-bottom: 25px; color: #1f2937;">Login Sistem</h2>
        
        <!-- Tampilkan pesan error jika login gagal -->
        @if(session('error'))
            <div style="background-color: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; text-align: left;">
                {{ session('error') }}
            </div>
        @endif

        <!-- Action diarahkan ke route login.post -->
        <form action="{{ route('login.post') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px; text-align: left;">
            @csrf
            <div>
                <label style="font-size: 14px; font-weight: 600; color: #374151; display: block; margin-bottom: 5px;">Username</label>
                <input type="text" name="username" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; background-color: #eff6ff;" value="staff">
            </div>
            <div>
                <label style="font-size: 14px; font-weight: 600; color: #374151; display: block; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; background-color: #eff6ff;" value="12345678">
            </div>
            <button type="submit" style="background-color: #2563eb; color: white; padding: 12px; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; margin-top: 10px;">Masuk</button>
        </form>
    </div>

</body>
</html>