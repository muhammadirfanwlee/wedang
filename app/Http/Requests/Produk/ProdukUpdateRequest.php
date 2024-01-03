<?php

namespace App\Http\Requests\Produk;

use Illuminate\Foundation\Http\FormRequest;

class ProdukUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validate = [
            'id_kategori' => ['sometimes', 'exists:kategori,id'],
            'nama_produk' => ['sometimes'],
            'deskripsi'   => ['sometimes'],
            'harga_jual'  => ['sometimes'],
            'gambar'      => ['sometimes', 'image', 'max:1024'],
        ];

        return $validate;
    }
}
