<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Sistem Laundry</title>

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

        /* NAVBAR */
        .navbar {
            background: #2563eb;
            color: white;
            padding: 17px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .menu {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 9px 13px;
            border-radius: 7px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: rgba(255,255,255,0.18);
        }

        .menu .active {
            background: rgba(255,255,255,0.20);
            font-weight: bold;
        }

        /* CONTAINER */
        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        /* WELCOME */
        .welcome {
            margin-bottom: 28px;
        }

        .welcome h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .welcome p {
            margin: 0;
            color: #6b7280;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
            border-left: 4px solid #2563eb;
        }

        .card:nth-child(2) {
            border-left-color: #7c3aed;
        }

        .card:nth-child(3) {
            border-left-color: #f59e0b;
        }

        .card:nth-child(4) {
            border-left-color: #16a34a;
        }

        .card h3 {
            margin: 0 0 12px;
            color: #6b7280;
            font-size: 14px;
            font-weight: normal;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
        }

        /* SECTION */
        .section {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .section h2 {
            margin: 0;
            font-size: 21px;
        }

        .btn-laporan {
            background: #111827;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 7px;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn-laporan:hover {
            background: #374151;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f9fafb;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }

        tr:hover {
            background: #f9fafb;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .diproses {
            background: #fef3c7;
            color: #92400e;
        }

        .selesai {
            background: #dcfce7;
            color: #166534;
        }

        .diambil {
            background: #dbeafe;
            color: #1e40af;
        }

        .empty {
            text-align: center;
            color: #6b7280;
            padding: 30px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

        }

        @media (max-width: 600px) {

            .cards {
                grid-template-columns: 1fr;
            }

            .container {
                margin: 25px auto;
                padding: 0 12px;
            }

            .navbar {
                padding: 15px;
            }

            .menu {
                width: 100%;
            }

            .menu a {
                padding: 8px 9px;
                font-size: 13px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }

            table {
                font-size: 13px;
            }

            th,
            td {
                padding: 9px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    <div class="navbar">

        <div class="brand">
            🧺 Sistem Laundry
        </div>

        <div class="menu">

            <a href="{{ route('dashboard') }}" class="active">
                Dashboard
            </a>

            <a href="{{ route('pelanggan.index') }}">
                Pelanggan
            </a>

            <a href="{{ route('layanan.index') }}">
                Layanan
            </a>

            <a href="{{ route('transaksi.index') }}">
                Transaksi
            </a>

            <a href="{{ route('laporan.index') }}">
                Laporan
            </a>

        </div>

    </div>


    <!-- CONTENT -->

    <div class="container">

        <!-- WELCOME -->

        <div class="welcome">

            <h1>Dashboard</h1>

            <p>
                Selamat datang di Sistem Pengelolaan Laundry.
            </p>

        </div>


        <!-- STATISTIK -->

        <div class="cards">

            <div class="card">

                <h3>Total Pelanggan</h3>

                <div class="number">
                    {{ $jumlahPelanggan }}
                </div>

            </div>


            <div class="card">

                <h3>Total Transaksi</h3>

                <div class="number">
                    {{ $jumlahTransaksi }}
                </div>

            </div>


            <div class="card">

                <h3>Sedang Diproses</h3>

                <div class="number">
                    {{ $jumlahDiproses }}
                </div>

            </div>


            <div class="card">

                <h3>Sudah Selesai</h3>

                <div class="number">
                    {{ $jumlahSelesai }}
                </div>

            </div>

        </div>


        <!-- TRANSAKSI TERBARU -->

        <div class="section">

            <div class="section-header">

                <h2>
                    Transaksi Terbaru
                </h2>

                <a href="{{ route('laporan.index') }}"
                   class="btn-laporan">
                    📊 Lihat Laporan
                </a>

            </div>


            @if ($transaksiTerbaru->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Pelanggan
                                </th>

                                <th>
                                    Layanan
                                </th>

                                <th>
                                    Berat
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($transaksiTerbaru as $transaksi)

                                <tr>

                                    <td>
                                        {{ $transaksi->pelanggan->nama }}
                                    </td>

                                    <td>
                                        {{ $transaksi->layanan->nama_layanan }}
                                    </td>

                                    <td>
                                        {{ $transaksi->berat }} Kg
                                    </td>

                                    <td>
                                        Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                    </td>

                                    <td>

                                        <span class="status {{ strtolower($transaksi->status) }}">

                                            {{ ucfirst($transaksi->status) }}

                                        </span>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty">
                    Belum ada transaksi.
                </div>

            @endif

        </div>

    </div>

</body>
</html>