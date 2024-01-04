<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  protected $table =
  'table_transaksi';

  protected $fillable = [
    'nama_user', 'nama_barang', 'total_harga',
  ];
}
