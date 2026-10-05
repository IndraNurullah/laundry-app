<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Layanan - Sistem Laundry</title>

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
            max-width: 1100px;
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
            padding: 11px 17px;
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

        .btn-edit {
            background: #f59e0b;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            color: #374151;
            font-size: 14px;
            text-align: left;
            padding: 15px;
            border-bottom: 2px solid #e5e7eb;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        tr:hover {
            background: #f9fafb;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .price {
            font-weight: bold;
            color: #16a34a;
        }

        .empty {
            text-align: center;
            color: #6b7280;
            padding: 30px;
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

            .card {
                overflow-x: auto;
            }

            table {
                min-width: 750px;
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
                <h1>Data Layanan Laundry</h1>
                <p>Kelola jenis layanan dan harga laundry.</p>
            </div>

            <a href="{{ route('layanan.create') }}" class="btn btn-primary">
                + Tambah Layanan
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
                        <th>Nama Layanan</th>
                        <th>Harga / Kg</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($layanans as $layanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $layanan->nama_layanan }}</strong>
                            </td>

                            <td class="price">
                                Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $layanan->deskripsi ?? '-' }}
                            </td>

                            <td>
                                <div class="actions">

                                    <a href="{{ route('layanan.edit', $layanan) }}"
                                       class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('layanan.destroy', $layanan) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada layanan.
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
