@extends('layouts.app')

@section('content')
<div class="content-container" style="max-width: 1000px; margin: 0 auto; box-sizing: border-box;">
    <header style="margin-bottom: 25px;">
        <h1 style="margin: 0; color: #1f2937;">Dashboard Ringkasan</h1>
    </header>

    <!-- Kartu Statistik -->
    <div style="display: flex; gap: 20px; margin-bottom: 25px; width: 100%;">
        <div class="stat-box" style="flex: 1; background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 30px; text-align: center; box-sizing: border-box;">
            <h3 style="color: #6b7280; font-size: 16px; margin-bottom: 10px; margin-top: 0;">Total Produk</h3>
            <p style="font-size: 36px; font-weight: 700; color: #2563eb; margin: 0;">{{ $totalProducts ?? 0 }}</p>
        </div>
        <div class="stat-box" style="flex: 1; background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 30px; text-align: center; box-sizing: border-box;">
            <h3 style="color: #6b7280; font-size: 16px; margin-bottom: 10px; margin-top: 0;">Total Stok Fisik</h3>
            <p style="font-size: 36px; font-weight: 700; color: #059669; margin: 0;">{{ $totalStock ?? 0 }}</p>
        </div>
        <div class="stat-box" style="flex: 1; background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 30px; text-align: center; box-sizing: border-box;">
            <h3 style="color: #6b7280; font-size: 16px; margin-bottom: 10px; margin-top: 0;">Kategori</h3>
            <p style="font-size: 36px; font-weight: 700; color: #d97706; margin: 0;">{{ $totalCategories ?? 0 }}</p>
        </div>
    </div>

    <!-- Tabel Riwayat Transaksi -->
    <div class="table-box" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 25px; width: 100%; box-sizing: border-box;">
        <h3 style="margin-top: 0; margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 10px; color: #1f2937;">5 Transaksi Terakhir</h3>
        @if(isset($recentTransactions) && $recentTransactions->isEmpty())
            <p style="color: #6b7280; margin: 0;">Belum ada riwayat transaksi.</p>
        @else
            <div style="overflow-x: auto;">
                <table style="width: 100%; min-width: 600px; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #e5e7eb; color: #4b5563;">
                            <th style="padding: 12px 15px; width: 20%;">Waktu</th>
                            <th style="padding: 12px 15px; width: 30%;">Produk</th>
                            <th style="padding: 12px 15px; width: 15%;">Jenis</th>
                            <th style="padding: 12px 15px; width: 15%;">Jumlah</th>
                            <th style="padding: 12px 15px; width: 20%;">Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentTransactions ?? [] as $t)
                            <tr style="border-bottom: 1px solid #f3f4f6;">
                                <td style="padding: 12px 15px; color: #6b7280; font-size: 14px;">{{ $t->created_at->format('d M Y H:i') }}</td>
                                <td style="padding: 12px 15px; font-weight: 500; color: #1f2937;">{{ $t->product->name ?? '-' }}</td>
                                <td style="padding: 12px 15px;">
                                    @if($t->type === 'in')
                                        <span style="background-color: #d1fae5; color: #065f46; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; white-space: nowrap;">MASUK</span>
                                    @else
                                        <span style="background-color: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; white-space: nowrap;">KELUAR</span>
                                    @endif
                                </td>
                                <td style="padding: 12px 15px; font-weight: bold; color: #1f2937;">{{ $t->quantity }}</td>
                                <td style="padding: 12px 15px; color: #6b7280; font-size: 14px;">{{ $t->user->name ?? 'Administrator' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection