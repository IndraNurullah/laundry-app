<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'layanan'])
            ->latest()
            ->get();

        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        $layanans = Layanan::orderBy('nama_layanan')->get();

        return view('transaksi.create', compact('pelanggans', 'layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:0.1',
            'tanggal_masuk' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);

        $hargaPerKg = $layanan->harga_per_kg;
        $totalHarga = $request->berat * $hargaPerKg;

        Transaksi::create([
            'pelanggan_id' => $request->pelanggan_id,
            'layanan_id' => $request->layanan_id,
            'berat' => $request->berat,
            'harga_per_kg' => $hargaPerKg,
            'total_harga' => $totalHarga,
            'status' => 'diproses',
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi laundry berhasil ditambahkan.');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['pelanggan', 'layanan']);

        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        $layanans = Layanan::orderBy('nama_layanan')->get();

        return view('transaksi.edit', compact(
            'transaksi',
            'pelanggans',
            'layanans'
        ));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:0.1',
            'status' => 'required|in:diproses,selesai,diambil',
            'tanggal_masuk' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);

        $hargaPerKg = $layanan->harga_per_kg;
        $totalHarga = $request->berat * $hargaPerKg;

        $transaksi->update([
            'pelanggan_id' => $request->pelanggan_id,
            'layanan_id' => $request->layanan_id,
            'berat' => $request->berat,
            'harga_per_kg' => $hargaPerKg,
            'total_harga' => $totalHarga,
            'status' => $request->status,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}