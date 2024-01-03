<?php

namespace App\Http\Requests\Produk;

use Illuminate\Foundation\Http\FormRequest;

class ProdukStoreRequest extends FormRequest
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
            'id_kategori' => ['required', 'exists:kategori,id'],
            'nama_produk' => ['required'],
            'deskripsi'   => ['required'],
            'harga_jual'  => ['required'],
            'gambar'      => ['required', 'image', 'max:1024'],
        ];

        return $validate;
    }
}
