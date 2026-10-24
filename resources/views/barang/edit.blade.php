<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <!-- Mengatur tampilan agar menyesuaikan ukuran layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul halaman edit -->
    <title>Edit Barang Inventaris</title>

    <!-- Menggunakan Bootstrap untuk mempercantik form -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">

        <!-- Judul halaman -->
        <h2 class="mb-4">Edit Barang Inventaris</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <!-- Menampilkan kesalahan validasi jika ada -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Periksa kembali data yang diisi:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form untuk mengirim perubahan data barang -->
                <form action="{{ route('barang.update', $barang->id) }}" method="POST">

                    <!-- Token keamanan Laravel -->
                    @csrf

                    <!-- Menggunakan metode PUT untuk memperbarui data -->
                    @method('PUT')

                    <!-- Input kode barang -->
                    <div class="mb-3">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" name="kode_barang"
                            class="form-control"
                            value="{{ old('kode_barang', $barang->kode_barang) }}" required>
                    </div>

                    <!-- Input nama barang -->
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang"
                            class="form-control"
                            value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                    </div>

                    <!-- Input kategori barang -->
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori"
                            class="form-control"
                            value="{{ old('kategori', $barang->kategori) }}" required>
                    </div>

                    <!-- Input jumlah barang -->
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah"
                            class="form-control"
                            value="{{ old('jumlah', $barang->jumlah) }}"
                            min="0" required>
                    </div>

                    <!-- Input lokasi penyimpanan -->
                    <div class="mb-3">
                        <label class="form-label">Lokasi Simpan</label>
                        <input type="text" name="lokasi_simpan"
                            class="form-control"
                            value="{{ old('lokasi_simpan', $barang->lokasi_simpan) }}" required>
                    </div>

                    <!-- Tombol menyimpan perubahan -->
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <!-- Tombol kembali ke daftar inventaris -->
                    <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>
            </div>
        </div>
    </div>

</body>
</html>
