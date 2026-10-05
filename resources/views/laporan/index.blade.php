<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Transaksi - Sistem Laundry</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .navbar {
            background: #2563eb;
            color: white;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 9px 13px;
            border-radius: 7px;
            transition: 0.2s;
        }

        .nav-links a:hover {
            background: rgba(255,255,255,0.18);
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin-bottom: 8px;
            font-size: 30px;
        }

        .header p {
            color: #6b7280;
            margin: 0;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
        }

        .card-title {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 26px;
            font-weight: bold;
        }

        .filter-box {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
            margin-bottom: 25px;
        }

        .filter-box h3 {
            margin-top: 0;
            margin-bottom: 18px;
        }

        .filter-form {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 14px;
            background: white;
        }

        .buttons {
            display: flex;
            gap: 8px;
        }

        .btn {
            border: none;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-print {
            background: #111827;
            color: white;
        }

        .table-box {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            gap: 15px;
        }

        .table-header h2 {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f3f4f6;
            text-align: left;
            padding: 13px;
            font-size: 14px;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        tr:hover {
            background: #f9fafb;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .badge-diproses {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .badge-diambil {
            background: #dbeafe;
            color: #1e40af;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        @media (max-width: 900px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-form {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px;
            }

            .container {
                padding: 0 12px;
            }
        }

        @media print {
            .navbar,
            .filter-box,
            .btn-print {
                display: none;
            }

            body {
                background: white;
            }

            .container {
                max-width: 100%;
                margin: 0;
            }

            .card,
            .table-box {
                box-shadow: none;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="brand">
        🧺 Sistem Laundry
    </div>

    <div class="nav-links">
        <a href="{{ url('/') }}">Dashboard</a>
        <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
        <a href="{{ route('layanan.index') }}">Layanan</a>
        <a href="{{ route('transaksi.index') }}">Transaksi</a>
        <a href="{{ route('laporan.index') }}">Laporan</a>
    </div>

</nav>


<div class="container">

    <div class="header">
        <h1>📊 Laporan Transaksi</h1>
        <p>Rekap dan laporan seluruh transaksi laundry.</p>
    </div>


    <div class="cards">

        <div class="card">
            <div class="card-title">Total Transaksi</div>
            <div class="card-value">
                {{ $totalTransaksi }}
            </div>
        </div>

        <div class="card">
            <div class="card-title">Total Berat</div>
            <div class="card-value">
                {{ number_format($totalBerat, 2, ',', '.') }} Kg
            </div>
        </div>

        <div class="card">
            <div class="card-title">Total Pendapatan</div>
            <div class="card-value">
                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
            </div>
        </div>

        <div class="card">
            <div class="card-title">Sudah Diambil</div>
            <div class="card-value">
                {{ $diambil }}
            </div>
        </div>

    </div>


    <div class="filter-box">

        <h3>🔎 Filter Laporan</h3>

        <form action="{{ route('laporan.index') }}" method="GET">

            <div class="filter-form">

                <div class="form-group">

                    <label>Status</label>

                    <select name="status">

                        <option value="">Semua Status</option>

                        <option value="diproses"
                            {{ request('status') == 'diproses' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="selesai"
                            {{ request('status') == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="diambil"
                            {{ request('status') == 'diambil' ? 'selected' : '' }}>
                            Diambil
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>Tanggal Mulai</label>

                    <input
                        type="date"
                        name="tanggal_mulai"
                        value="{{ request('tanggal_mulai') }}"
                    >

                </div>


                <div class="form-group">

                    <label>Tanggal Akhir</label>

                    <input
                        type="date"
                        name="tanggal_akhir"
                        value="{{ request('tanggal_akhir') }}"
                    >

                </div>


                <div class="buttons">

                    <button type="submit" class="btn btn-primary">
                        🔎 Filter
                    </button>

                    <a href="{{ route('laporan.index') }}"
                       class="btn btn-secondary">
                        Reset
                    </a>

                </div>

            </div>

        </form>

    </div>


    <div class="table-box">

        <div class="table-header">

            <h2>Data Transaksi</h2>

            <button
                onclick="window.print()"
                class="btn btn-print">
                🖨️ Cetak Laporan
            </button>

        </div>


        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Berat</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal Masuk</th>
                </tr>

            </thead>


            <tbody>

                @forelse ($transaksis as $transaksi)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $transaksi->pelanggan->nama }}
                        </td>

                        <td>
                            {{ $transaksi->layanan->nama_layanan }}
                        </td>

                        <td>
                            {{ number_format($transaksi->berat, 2, ',', '.') }} Kg
                        </td>

                        <td>
                            Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                        </td>

                        <td>

                            @if ($transaksi->status == 'diproses')

                                <span class="badge badge-diproses">
                                    Diproses
                                </span>

                            @elseif ($transaksi->status == 'selesai')

                                <span class="badge badge-selesai">
                                    Selesai
                                </span>

                            @elseif ($transaksi->status == 'diambil')

                                <span class="badge badge-diambil">
                                    Diambil
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $transaksi->tanggal_masuk->format('d-m-Y') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="empty">
                            Tidak ada transaksi yang ditemukan.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>