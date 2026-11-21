

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat - Katalog Farmasi</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <header class="header">
            <h1>Klinik Rawat Jalan</h1>
            <p>Modul Katalog Farmasi</p>
        </header>

        <div class="content">

            <a href="{{ route('obat.daftar') }}" class="back-link">
                ← Kembali ke Katalog
            </a>

            <div class="page-title">
                <h2>Edit Data Obat</h2>
                <p>Ubah informasi obat yang ingin diperbarui.</p>
            </div>

            <form action="{{ route('obat.update', $obat->id_obat) }}"
                  class="form-card" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group full">
                    <label for="nama-obat">Nama Obat</label>
                    <input
                        type="text"
                        id="nama-obat"
                        name="nama_obat"
                        value="{{ old('nama_obat', $obat->nama_obat) }}"
                        required
                    >
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="kategori">Kategori Obat</label>

                        <select id="kategori" name="kategori_obat" required>
                            <option value="Analgesik" {{ old('kategori_obat', $obat->kategori_obat) == 'Analgesik' ? 'selected' : '' }}>Analgesik</option>
                            <option value="Antibiotik" {{ old('kategori_obat', $obat->kategori_obat) == 'Antibiotik' ? 'selected' : '' }}>Antibiotik</option>
                            <option value="Vitamin" {{ old('kategori_obat', $obat->kategori_obat) == 'Vitamin' ? 'selected' : '' }}>Vitamin</option>
                            <option value="Antipiretik" {{ old('kategori_obat', $obat->kategori_obat) == 'Antipiretik' ? 'selected' : '' }}>Antipiretik</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sediaan">Sediaan</label>
                        <input
                            type="text"
                            id="sediaan"
                            name="sediaan"
                            value="{{ old('sediaan', $obat->sediaan) }}"
                            required
                        >
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="pabrikan">Pabrikan</label>
                        <input
                            type="text"
                            id="pabrikan"
                            name="pabrikan"
                            value="{{ old('pabrikan', $obat->pabrikan) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input
                            type="number"
                            id="stok"
                            name="stok"
                            value="{{ old('stok', $obat->stok) }}"
                            required
                        >
                    </div>

                </div>

                <div class="form-group full">
                    <label for="harga">Harga</label>
                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        value="{{ old('harga', $obat->harga) }}"
                        required
                    >
                </div>

                <div class="form-action">
                    <a href="{{ route('obat.daftar') }}" class="btn-batal">
                        Batal
                    </a>

                    <button type="submit" class="btn-simpan">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>

