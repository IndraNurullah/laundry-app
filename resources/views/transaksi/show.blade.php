<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Transaksi - Sistem Laundry</title>

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
            padding: 17px 35px;
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
        }

        .menu a:hover {
            background: rgba(255,255,255,0.18);
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
        }

        .header {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .detail {
            display: grid;
            grid-template-columns: 200px 1fr;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail:last-child {
            border-bottom: none;
        }

        .label {
            padding: 15px 10px;
            font-weight: bold;
            color: #6b7280;
            background: #f9fafb;
        }

        .value {
            padding: 15px 10px;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
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

        .total {
            font-size: 20px;
            font-weight: bold;
            color: #2563eb;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 11px 18px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 15px;
            }

            .container {
                margin: 25px auto;
                padding: 0 12px;
            }

            .card {
                padding: 20px;
            }

            .detail {
                grid-template-columns: 1fr;
            }

            .label {
                padding-bottom: 5px;
            }

            .value {
                padding-top: 5px;
            }

            .menu a {
                font-size: 13px;
                padding: 8px 9px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">

        <div class="brand">
            🧺 Sistem Laundry
        </div>

        <div class="menu">

            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
            <a href="{{ route('layanan.index') }}">Layanan</a>
            <a href="{{ route('transaksi.index') }}">Transaksi</a>
            <a href="{{ route('laporan.index') }}">Laporan</a>

        </div>

    </div>


    <div class="container">

        <div class="card">

            <div class="header">

                <h1>📄 Detail Transaksi</h1>

                <p>
                    Informasi lengkap transaksi laundry.
                </p>

            </div>


            <div class="detail">

                <div class="label">
                    Pelanggan
                </div>

                <div class="value">
                    {{ $transaksi->pelanggan->nama }}
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Nomor HP
                </div>

                <div class="value">
                    {{ $transaksi->pelanggan->no_hp }}
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Layanan
                </div>

                <div class="value">
                    {{ $transaksi->layanan->nama_layanan }}
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Harga per Kg
                </div>

                <div class="value">
                    Rp {{ number_format($transaksi->harga_per_kg, 0, ',', '.') }}
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Berat
                </div>

                <div class="value">
                    {{ number_format($transaksi->berat, 2, ',', '.') }} Kg
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Total Harga
                </div>

                <div class="value total">
                    Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Status
                </div>

                <div class="value">

                    <span class="status {{ strtolower($transaksi->status) }}">
                        {{ ucfirst($transaksi->status) }}
                    </span>

                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Tanggal Masuk
                </div>

                <div class="value">
                    {{ $transaksi->tanggal_masuk->format('d-m-Y') }}
                </div>

            </div>


            <div class="detail">

                <div class="label">
                    Tanggal Selesai
                </div>

                <div class="value">

                    @if ($transaksi->tanggal_selesai)

                        {{ $transaksi->tanggal_selesai->format('d-m-Y') }}

                    @else

                        <span style="color:#9ca3af;">
                            Belum selesai
                        </span>

                    @endif

                </div>

            </div>


            <div class="actions">

                <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                   class="btn btn-primary">
                    ✏️ Edit Transaksi
                </a>

                <a href="{{ route('transaksi.index') }}"
                   class="btn btn-secondary">
                    ← Kembali
                </a>

            </div>

        </div>

    </div>

</body>
</html>