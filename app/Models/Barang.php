<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'jumlah',
        'lokasi_simpan',
    ];
}
