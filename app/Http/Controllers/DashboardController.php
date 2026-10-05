<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPelanggan = Pelanggan::count();
        $jumlahTransaksi = Transaksi::count();
        $jumlahDiproses = Transaksi::where('status', 'diproses')->count();
        $jumlahSelesai = Transaksi::where('status', 'selesai')->count();

        $transaksiTerbaru = Transaksi::with(['pelanggan', 'layanan'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'jumlahPelanggan',
            'jumlahTransaksi',
            'jumlahDiproses',
            'jumlahSelesai',
            'transaksiTerbaru'
        ));
    }
}
