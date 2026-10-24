<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration ini digunakan untuk membuat tabel inventaris barang
return new class extends Migration
{
    // Fungsi up() dijalankan saat kita menjalankan perintah migrate
    public function up(): void
    {
        // Membuat tabel bernama items sesuai ketentuan tugas UTS
        Schema::create('items', function (Blueprint $table) {
            
            // Membuat ID sebagai kunci utama tabel
            $table->id();

            // Kode barang wajib diisi dan tidak boleh sama
            $table->string('kode_barang')->unique();

            // Menyimpan nama barang
            $table->string('nama_barang');

            // Menyimpan kategori barang
            $table->string('kategori');

            // Menyimpan jumlah barang dan hanya menerima angka bulat positif
            $table->unsignedInteger('jumlah');

            // Menyimpan lokasi barang disimpan
            $table->string('lokasi_simpan');

            // Membuat kolom created_at dan updated_at
            // untuk mencatat waktu data dibuat dan diperbarui
            $table->timestamps();
        });
    }

    // Fungsi down() dijalankan jika migration dibatalkan
    public function down(): void
    {
        // Menghapus tabel items jika migration di-rollback
        Schema::dropIfExists('items');
    }
};
