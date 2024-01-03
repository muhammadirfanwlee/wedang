<?php

namespace App\Services\Produk;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Exceptions\InvalidException;
use App\Models\Produk;
use App\Models\Kategori;

/**
 * Class ProdukService.
 */
class ProdukService
{
    public function index($request)
    {
        $products = new Produk();

        if ($request->has('search')) {
            $products = $products->where('nama_kategori', $request->search);
        }

        $products = $products->get();

        $products->map(function($product) {
            $product['gambar_url'] = $product->gambar_url;
            $product['kategori']   = $product->kategori;
        });

        return $products;
    }

    public function store($request, $input)
    {
        DB::beginTransaction();

        try {
            if (isset($request['gambar'])) {
                $request['image']   = Storage::disk('public')->putFile('images/gambar', $request->file('gambar'));
                $input['gambar']    = $request['image'];
            }

            $data = Produk::create($input);
            DB::commit();

            return $data;
        } catch (\Throwable $th) {
            DB::rollback();

            report($th);
            throw new InvalidException($th->getMessage());
        }
    }

    public function update($request, $input, $product)
    {
        DB::beginTransaction();

        try {
            if (isset($request['gambar'])) {
                if (@$product->gambar) {
                    Storage::disk('public')->delete($product->gambar);

                    $request['image'] = Storage::disk('public')->putFileAs('images/gambar', $request->file('gambar'), Str::replace('images/gambar/', '', $product->gambar));
                    $input['gambar']  = $request['image'];
                } else {
                    $request['image'] = Storage::disk('public')->putFile('images/gambar', $request->file('gambar'));
                    $input['gambar']  = $request['image'];
                }
            }

            $product->id_kategori = $input['id_kategori'] ?? $product->id_kategori;
            $product->nama_produk = $input['nama_produk'] ?? $product->nama_produk;
            $product->deskripsi   = $input['deskripsi']   ?? $product->deskripsi;
            $product->harga_jual  = $input['harga_jual']  ?? $product->harga_jual;
            $product->gambar      = $input['gambar']      ?? $product->gambar;
            $product->updated_at  = date('Y-m-d H:i:s');
            $product->save();

            DB::commit();

            return $product;
        } catch (\Throwable $th) {
            DB::rollback();

            report($th);
            throw new InvalidException($th->getMessage());
        }
    }

    public function destroy($product)
    {
        DB::beginTransaction();

        try {
            $product->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            report($th);
            throw new InvalidException($th->getMessage());
        }
    }

}
