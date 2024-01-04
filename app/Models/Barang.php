<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table =
    'table_barang';

  protected $fillable = [
    'nama_barang', 'kategori_barang', 'satuan', 'harga', 'deskripsi_barang'
  ];
}
