<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Sistem Laundry</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: #1f2937;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            color: white;
            font-size: 22px;
            font-weight: bold;
        }

        .menu a {
            color: #d1d5db;
            text-decoration: none;
            margin-left: 25px;
            font-size: 14px;
        }

        .menu a:hover {
            color: white;
        }

        .container {
            max-width: 1250px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #111827;
        }

        .header p {
            margin-top: 8px;
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
            padding: 11px 17px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-detail {
            background: #6b7280;
            color: white;
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
        }

        .btn-detail:hover {
            background: #4b5563;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th {
            background: #f9fafb;
            color: #374151;
            font-size: 13px;
            text-align: left;
            padding: 15px 12px;
            border-bottom: 2px solid #e5e7eb;
            white-space: nowrap;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
            vertical-align: middle;
        }

        tr:hover {
            background: #f9fafb;
        }

        .price {
            font-weight: bold;
            color: #16a34a;
            white-space: nowrap;
        }

        .weight {
            white-space: nowrap;
        }

        .date {
            white-space: nowrap;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .status-diproses {
            background: #fef3c7;
            color: #92400e;
        }

        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .status-diambil {
            background: #dbeafe;
            color: #1e40af;
        }

        .actions {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .empty {
            text-align: center;
            color: #6b7280;
            padding: 35px;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 18px 20px;
            }

            .menu a {
                margin: 0 8px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .container {
                margin-top: 25px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">
            🧺 Sistem Laundry
        </div>

        <div class="menu">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
            <a href="{{ route('layanan.index') }}">Layanan</a>
            <a href="{{ route('transaksi.index') }}">Transaksi</a>
        </div>
    </nav>

    <div class="container">

        <div class="header">
            <div>
                <h1>Transaksi Laundry</h1>
                <p>Kelola seluruh transaksi laundry.</p>
            </div>

            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                + Transaksi Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
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
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($transaksis as $transaksi)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $transaksi->pelanggan->nama }}</strong>
                            </td>

                            <td>
                                {{ $transaksi->layanan->nama_layanan }}
                            </td>

                            <td class="weight">
                                {{ $transaksi->berat }} Kg
                            </td>

                            <td class="price">
                                Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="status status-{{ $transaksi->status }}">
                                    {{ ucfirst($transaksi->status) }}
                                </span>
                            </td>

                            <td class="date">
                                {{ $transaksi->tanggal_masuk->format('d-m-Y') }}
                            </td>

                            <td>
                                <div class="actions">

                                    <a href="{{ route('transaksi.show', $transaksi) }}"
                                       class="btn btn-detail">
                                        Detail
                                    </a>

                                    <a href="{{ route('transaksi.edit', $transaksi) }}"
                                       class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('transaksi.destroy', $transaksi) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="empty">
                                Belum ada transaksi.
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
