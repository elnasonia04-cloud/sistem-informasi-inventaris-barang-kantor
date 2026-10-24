<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <!-- Mengatur tampilan agar menyesuaikan ukuran layar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul halaman inventaris barang -->
    <title>Inventaris Barang Kantor</title>

    <!-- Menggunakan Bootstrap untuk mempercantik tampilan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Bagian utama halaman -->
    <div class="container mt-5">

        <!-- Judul halaman -->
        <h2 class="mb-4">Sistem Informasi Inventaris Barang Kantor</h2>

        <!-- Menampilkan pesan jika data berhasil ditambah, diedit, atau dihapus -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}

                <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        
<!-- Tombol tambah barang dan kotak pencarian -->
<div class="d-flex flex-wrap justify-content-between gap-3 mb-3">

    <!-- Tombol untuk membuka form tambah barang -->
    <a href="{{ route('barang.create') }}" class="btn btn-primary">
        + Tambah Barang
    </a>

    <!-- Form untuk mencari data barang -->
    <form action="{{ route('barang.index') }}" method="GET"
          class="d-flex gap-2">

        <input
            type="text"
            name="cari"
            class="form-control"
            placeholder="Cari kode, nama, kategori..."
            value="{{ request('cari') }}"
        >

        <button type="submit" class="btn btn-success">
            Cari
        </button>

        <!-- Tombol untuk menampilkan semua barang kembali -->
        @if (request('cari'))
            <a href="{{ route('barang.index') }}"
               class="btn btn-secondary">
                Reset
            </a>
        @endif

    </form>

</div>

        <!-- Card untuk menampilkan tabel inventaris -->
        <div class="card shadow-sm">
            <div class="card-body">

                <h5 class="card-title mb-3">Daftar Inventaris Barang</h5>

                <!-- Membuat tabel bisa digeser di layar kecil -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">

                        <!-- Judul kolom tabel -->
                        <thead class="table-primary">
                            <tr>
                                <th>No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Lokasi Simpan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Memeriksa dan menampilkan data barang -->
                            @forelse ($barangs as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->kategori }}</td>
                                    <td>{{ $barang->jumlah }}</td>
                                    <td>{{ $barang->lokasi_simpan }}</td>

                                    <!-- Tombol Edit dan Hapus -->
                                    <td>
                                        <div class="d-flex gap-2">

                                            <!-- Tombol untuk mengedit barang -->
                                            <a href="{{ route('barang.edit', $barang->id) }}"
                                               class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <!-- Form untuk menghapus barang -->
                                            <form action="{{ route('barang.destroy', $barang->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus barang ini?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <!-- Ditampilkan jika belum ada barang -->
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Belum ada data barang.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript Bootstrap untuk tombol tutup pesan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
