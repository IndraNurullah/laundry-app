<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['pelanggan', 'layanan']);

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan tanggal mulai
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_masuk', '>=', $request->tanggal_mulai);
        }

        // Filter berdasarkan tanggal akhir
        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal_masuk', '<=', $request->tanggal_akhir);
        }

        $transaksis = $query
            ->orderBy('tanggal_masuk', 'desc')
            ->get();

        $totalTransaksi = $transaksis->count();

        $totalPendapatan = $transaksis->sum('total_harga');

        $totalBerat = $transaksis->sum('berat');

        $diproses = $transaksis->where('status', 'diproses')->count();

        $selesai = $transaksis->where('status', 'selesai')->count();

        $diambil = $transaksis->where('status', 'diambil')->count();

        return view('laporan.index', compact(
            'transaksis',
            'totalTransaksi',
            'totalPendapatan',
            'totalBerat',
            'diproses',
            'selesai',
            'diambil'
        ));
    }
}