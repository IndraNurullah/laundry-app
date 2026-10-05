<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button, .back {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #6b7280;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Transaksi</h1>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="pelanggan_id">Pelanggan</label>
        <select name="pelanggan_id" id="pelanggan_id" required>
            @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}"
                    {{ $transaksi->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                    {{ $pelanggan->nama }}
                </option>
            @endforeach
        </select>

        <label for="layanan_id">Layanan</label>
        <select name="layanan_id" id="layanan_id" required>
            @foreach ($layanans as $layanan)
                <option value="{{ $layanan->id }}"
                    {{ $transaksi->layanan_id == $layanan->id ? 'selected' : '' }}>
                    {{ $layanan->nama_layanan }}
                </option>
            @endforeach
        </select>

        <label for="berat">Berat (Kg)</label>
        <input
            type="number"
            name="berat"
            id="berat"
            step="0.01"
            value="{{ $transaksi->berat }}"
            required
        >

       <label for="status">Status</label>
<select name="status" id="status" required>
    <option value="diproses" {{ $transaksi->status == 'diproses' ? 'selected' : '' }}>
        Diproses
    </option>

    <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>
        Selesai
    </option>

    <option value="diambil" {{ $transaksi->status == 'diambil' ? 'selected' : '' }}>
        Diambil
    </option>
</select>

        <label for="tanggal_masuk">Tanggal Masuk</label>
        <input
            type="date"
            name="tanggal_masuk"
            id="tanggal_masuk"
            value="{{ $transaksi->tanggal_masuk }}"
            required
        >

        <div class="buttons">
            <button type="submit">Update Transaksi</button>

            <a href="{{ route('transaksi.index') }}" class="back">
                Kembali
            </a>
        </div>

    </form>

</div>

</body>
</html>
