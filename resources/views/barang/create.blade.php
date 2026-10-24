<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <!-- Mengatur tampilan agar menyesuaikan layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul halaman -->
    <title>Tambah Barang Inventaris</title>

    <!-- Menggunakan Bootstrap untuk tampilan form -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">

        <!-- Judul halaman tambah barang -->
        <h2 class="mb-4">Tambah Barang Inventaris</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <!-- Menampilkan pesan kesalahan validasi -->
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

                <!-- Form mengirim data ke route barang.store -->
                <form action="{{ route('barang.store') }}" method="POST">

                    <!-- Token keamanan Laravel untuk form -->
                    @csrf

                    <!-- Input kode barang -->
                    <div class="mb-3">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" name="kode_barang"
                            class="form-control"
                            value="{{ old('kode_barang') }}"
                            placeholder="Contoh: BRG001" required>
                    </div>

                    <!-- Input nama barang -->
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang"
                            class="form-control"
                            value="{{ old('nama_barang') }}"
                            placeholder="Contoh: Laptop" required>
                    </div>

                    <!-- Input kategori barang -->
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori"
                            class="form-control"
                            value="{{ old('kategori') }}"
                            placeholder="Contoh: Elektronik" required>
                    </div>

                    <!-- Input jumlah barang -->
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah"
                            class="form-control"
                            value="{{ old('jumlah') }}"
                            min="0" required>
                    </div>

                    <!-- Input lokasi penyimpanan barang -->
                    <div class="mb-3">
                        <label class="form-label">Lokasi Simpan</label>
                        <input type="text" name="lokasi_simpan"
                            class="form-control"
                            value="{{ old('lokasi_simpan') }}"
                            placeholder="Contoh: Ruang TU" required>
                    </div>

                    <!-- Tombol untuk menyimpan data -->
                    <button type="submit" class="btn btn-primary">
                        Simpan Barang
                    </button>

                    <!-- Tombol kembali ke daftar barang -->
                    <a href="{{ route('barang.index') }}"
                        class="btn btn-secondary">
                        Kembali
                    </a>

                </form>
            </div>
        </div>
    </div>

</body>
</html>
