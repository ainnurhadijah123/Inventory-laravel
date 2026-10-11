@extends('layouts.app')
@section('title', 'Ganti Password')

@section('content')
<div style="background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); max-width: 500px; margin: 0 auto;">
    <h2 style="margin-top: 0; margin-bottom: 25px; color: #1f2937; text-align: center;">Ganti Password</h2>

    <!-- Pesan Sukses / Error -->
    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">{{ session('error') }}</div>
    @endif
    
    <!-- Pesan Error Validasi (Misal: Password baru tidak sama dengan konfirmasi) -->
    @if($errors->any())
        <div style="background-color: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf
        
        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Password Lama</label>
            <input type="password" name="current_password" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Password Baru</label>
            <input type="password" name="new_password" required minlength="8" placeholder="Minimal 8 karakter" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; color: #374151; font-weight: 600;">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" required minlength="8" placeholder="Ketik ulang password baru" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
        </div>

        <button type="submit" style="background-color: #059669; color: white; border: none; padding: 12px; border-radius: 6px; font-weight: 600; cursor: pointer; margin-top: 10px;">Update Password</button>
    </form>
</div>
@endsection