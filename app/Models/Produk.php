<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'produk';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "id_kategori",
        "gambar",
        "nama_produk",
        "deskripsi",
        "harga_jual",
    ];

    protected $appends = ['gambar_url'];

    public function getGambarUrlAttribute() {
        if ($this->gambar) {
            $image_url = Storage::disk('public')->url($this->gambar);
        } else {
            $image_url = NULL;
        }

        return $image_url;
    }

    public function kategori() {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }
}
