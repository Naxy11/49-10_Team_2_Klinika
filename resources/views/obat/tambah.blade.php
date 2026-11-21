<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat - Katalog Farmasi</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <header class="header">
            <div>
                <h1>Klinik Rawat Jalan</h1>
                <p>Modul Katalog Farmasi</p>
            </div>
        </header>

        <div class="content">

            <a href="{{ route('obat.daftar') }}" class="back-link">← Kembali ke Katalog</a>

            <div class="page-title">
                <h2>Tambah Data Obat</h2>
                <p>Isi informasi obat yang akan ditambahkan ke katalog.</p>
            </div>

            <form action="{{ route('obat.simpan') }}" class="form-card" method="POST">
                @csrf

                <div class="form-group full">
                    <label for="nama-obat">Nama Obat</label>
                    <input 
                        type="text" 
                        id="nama-obat"
                        name="nama_obat"
                        placeholder="Contoh: Paracetamol 500mg"
                    >
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="kategori">Kategori Obat</label>

                        <select id="kategori" name="kategori_obat">
                            <option value="">Pilih kategori</option>
                            <option>Analgesik</option>
                            <option>Antibiotik</option>
                            <option>Vitamin</option>
                            <option>Antipiretik</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sediaan">Sediaan</label>

                        <input 
                            type="text"
                            id="sediaan"
                            name="sediaan"
                            placeholder="Contoh: Tablet"
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
                            placeholder="Contoh: Kimia Farma"
                        >
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok</label>

                        <input 
                            type="number"
                            id="stok"
                            name="stok"
                            placeholder="Contoh: 150"
                        >
                    </div>

                </div>

                <div class="form-group full">
                    <label for="harga">Harga</label>

                    <input 
                        type="number"
                        id="harga"
                        name="harga"
                        placeholder="Contoh: 5000"
                    >
                </div>

                <div class="form-action">
                    <a href="{{ route('obat.daftar') }}" class="btn-batal">Batal</a>

                    <button type="submit" name="simpan" class="btn-simpan">
                        Simpan Data
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>