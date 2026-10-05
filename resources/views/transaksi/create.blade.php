<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Transaksi - Sistem Laundry</title>

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
            max-width: 750px;
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
            margin: 0 0 8px;
        }

        .subtitle {
            color: #6b7280;
            margin: 0 0 25px;
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

        select,
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 14px;
            background: white;
        }

        select:focus,
        input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .info {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 13px;
            margin-bottom: 22px;
            border-radius: 6px;
            font-size: 14px;
            color: #1e40af;
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

            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
            <a href="{{ route('layanan.index') }}">Layanan</a>
            <a href="{{ route('transaksi.index') }}">Transaksi</a>
            <a href="{{ route('laporan.index') }}">Laporan</a>

        </div>

    </div>


    <div class="container">

        <div class="card">

            <h1>➕ Tambah Transaksi</h1>

            <p class="subtitle">
                Masukkan data transaksi laundry baru.
            </p>

            <div class="info">
                💡 Total harga akan dihitung otomatis berdasarkan berat
                dan harga layanan per kilogram.
            </div>

            <form action="{{ route('transaksi.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="pelanggan_id">
                        Pelanggan
                    </label>

                    <select name="pelanggan_id" id="pelanggan_id" required>

                        <option value="">
                            -- Pilih Pelanggan --
                        </option>

                        @foreach ($pelanggans as $pelanggan)

                            <option
                                value="{{ $pelanggan->id }}"
                                {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}
                            >
                                {{ $pelanggan->nama }}
                            </option>

                        @endforeach

                    </select>

                    @error('pelanggan_id')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="layanan_id">
                        Layanan
                    </label>

                    <select name="layanan_id" id="layanan_id" required>

                        <option value="">
                            -- Pilih Layanan --
                        </option>

                        @foreach ($layanans as $layanan)

                            <option
                                value="{{ $layanan->id }}"
                                {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}
                            >
                                {{ $layanan->nama_layanan }}
                                - Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}/Kg
                            </option>

                        @endforeach

                    </select>

                    @error('layanan_id')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="berat">
                        Berat (Kg)
                    </label>

                    <input
                        type="number"
                        name="berat"
                        id="berat"
                        step="0.01"
                        min="0.1"
                        value="{{ old('berat') }}"
                        placeholder="Contoh: 5"
                        required
                    >

                    @error('berat')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select name="status" id="status" required>

                        <option value="diproses"
                            {{ old('status', 'diproses') == 'diproses' ? 'selected' : '' }}>
                            Diproses
                        </option>

                        <option value="selesai"
                            {{ old('status') == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="diambil"
                            {{ old('status') == 'diambil' ? 'selected' : '' }}>
                            Diambil
                        </option>

                    </select>

                    @error('status')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="tanggal_masuk">
                        Tanggal Masuk
                    </label>

                    <input
                        type="date"
                        name="tanggal_masuk"
                        id="tanggal_masuk"
                        value="{{ old('tanggal_masuk', date('Y-m-d')) }}"
                        required
                    >

                    @error('tanggal_masuk')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="tanggal_selesai">
                        Tanggal Selesai
                    </label>

                    <input
                        type="date"
                        name="tanggal_selesai"
                        id="tanggal_selesai"
                        value="{{ old('tanggal_selesai') }}"
                    >

                    @error('tanggal_selesai')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="actions">

                    <button type="submit" class="btn btn-primary">
                        💾 Simpan Transaksi
                    </button>

                    <a href="{{ route('transaksi.index') }}"
                       class="btn btn-secondary">
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>