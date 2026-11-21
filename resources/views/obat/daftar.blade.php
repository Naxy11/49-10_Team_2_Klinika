
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Farmasi - Klinik Rawat Jalan</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <header class="header">
            <h1>Katalog Farmasi</h1>
            <p>Sistem Informasi Klinik Rawat Jalan</p>

            <form action="{{ route('auth.logout') }}" method="POST">
             @csrf
            <button type="submit" class="btn-hapus">Logout</button>
            </form>
        </header>

        <div class="content">

            <div class="section-title">
                <div>
                    <h2>Data Obat</h2>
                    <p>Daftar obat yang tersedia di klinik</p>
                </div>

                <a href="{{ route('obat.tambah') }}" class="btn-tambah">
                    + Tambah Obat
                </a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Kategori</th>
                            <th>Sediaan</th>
                            <th>Pabrikan</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($obat as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_obat }}</td>
                                <td>{{ $item->kategori_obat }}</td>
                                <td>{{ $item->sediaan }}</td>
                                <td>{{ $item->pabrikan }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>

                                <td>
                                    <a href="{{ route('obat.edit', $item->id_obat) }}" class="btn-edit">Edit</a>

                                    <form action="{{ route('obat.hapus', $item->id_obat) }}"
                                            method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-hapus">Hapus</button>
                                        </form>
                                     </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Belum ada data obat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</body>
</html>

