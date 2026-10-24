<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan daftar inventaris dan mencari barang
    public function index(Request $request)
    {
        // Membuat query untuk mengambil data barang
        $query = Barang::query();

        // Memeriksa apakah pengguna memasukkan kata pencarian
        if ($request->filled('cari')) {
            $kataKunci = $request->cari;

            // Mencari berdasarkan kode, nama, kategori, atau lokasi
            $query->where(function ($q) use ($kataKunci) {
                $q->where('kode_barang', 'like', "%{$kataKunci}%")
                  ->orWhere('nama_barang', 'like', "%{$kataKunci}%")
                  ->orWhere('kategori', 'like', "%{$kataKunci}%")
                  ->orWhere('lokasi_simpan', 'like', "%{$kataKunci}%");
            });
        }

        // Mengambil data barang berdasarkan hasil pencarian
        $barangs = $query->orderBy('id')->get();

        // Mengirim data ke halaman daftar barang
        return view('barang.index', compact('barangs'));
    }

    // Menampilkan form untuk menambah barang
    public function create()
    {
        return view('barang.create');
    }

    // Memproses dan menyimpan barang baru
    public function store(Request $request)
    {
        // Memeriksa apakah data yang dimasukkan sudah sesuai
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:255|unique:items,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'lokasi_simpan' => 'required|string|max:255',
        ]);

        // Menyimpan data yang sudah lolos validasi
        Barang::create($validated);

        // Kembali ke daftar barang dengan pesan berhasil
        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit barang
    public function edit(Barang $barang)
    {
        // Mengirim data barang yang dipilih ke halaman edit
        return view('barang.edit', compact('barang'));
    }

    // Memproses perubahan data barang
    public function update(Request $request, Barang $barang)
    {
        // Memeriksa data sebelum diperbarui
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:255|unique:items,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'lokasi_simpan' => 'required|string|max:255',
        ]);

        // Memperbarui data barang di database
        $barang->update($validated);

        // Kembali ke daftar barang setelah berhasil diperbarui
        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui!');
    }

    // Menghapus data barang dari database
    public function destroy(Barang $barang)
    {
        // Menghapus barang yang dipilih
        $barang->delete();

        // Kembali ke halaman daftar barang
        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil dihapus!');
    }
}
