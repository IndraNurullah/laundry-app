<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Layanan - Sistem Laundry</title>

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
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 14px;
            font-family: inherit;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
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
                padding: 22px;
            }

            .menu a {
                font-size: 13px;
                padding: 8px 9px;
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

            <a href="{{ route('dashboard') }}">
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


    <div class="container">

        <div class="card">

            <h1>➕ Tambah Layanan</h1>

            <p class="subtitle">
                Masukkan data layanan laundry baru.
            </p>

            <form action="{{ route('layanan.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="nama_layanan">
                        Nama Layanan
                    </label>

                    <input
                        type="text"
                        id="nama_layanan"
                        name="nama_layanan"
                        value="{{ old('nama_layanan') }}"
                        placeholder="Contoh: Cuci Kering"
                        required
                    >

                    @error('nama_layanan')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="harga_per_kg">
                        Harga per Kg
                    </label>

                    <input
                        type="number"
                        id="harga_per_kg"
                        name="harga_per_kg"
                        value="{{ old('harga_per_kg') }}"
                        placeholder="Contoh: 7000"
                        min="0"
                        required
                    >

                    @error('harga_per_kg')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="deskripsi">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        placeholder="Masukkan deskripsi layanan"
                    >{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="actions">

                    <button type="submit" class="btn btn-primary">
                        💾 Simpan Layanan
                    </button>

                    <a href="{{ route('layanan.index') }}"
                       class="btn btn-secondary">
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>