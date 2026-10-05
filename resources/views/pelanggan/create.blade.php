<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pelanggan - Sistem Laundry</title>

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

            <h1>➕ Tambah Pelanggan</h1>

            <p class="subtitle">
                Masukkan data pelanggan baru.
            </p>

            <form action="{{ route('pelanggan.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="nama">
                        Nama Pelanggan
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama pelanggan"
                        required
                    >

                    @error('nama')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="no_hp">
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        id="no_hp"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="Contoh: 08123456789"
                        required
                    >

                    @error('no_hp')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="alamat">
                        Alamat
                    </label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        placeholder="Masukkan alamat pelanggan"
                        required
                    >{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="actions">

                    <button type="submit" class="btn btn-primary">
                        💾 Simpan Pelanggan
                    </button>

                    <a href="{{ route('pelanggan.index') }}"
                       class="btn btn-secondary">
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>