<?php

namespace App\Services\Kategori;

use Illuminate\Support\Facades\DB;

use App\Exceptions\InvalidException;
use App\Models\Kategori;

/**
 * Class KategoriService.
 */
class KategoriService
{
    public function index()
    {
        $data = Kategori::all();

        return $data;
    }

    public function store($request, $input)
    {
        DB::beginTransaction();

        try {
            $data = Kategori::create($input);
            DB::commit();

            return $data;
        } catch (\Throwable $th) {
            DB::rollback();

            report($th);
            throw new InvalidException($th->getMessage());
        }
    }

    public function update($request, $input, $kategori)
    {
        DB::beginTransaction();

        try {
            $kategori->nama_kategori = $input['nama_kategori'] ?? $kategori->nama_kategori;
            $kategori->updated_at     = date('Y-m-d H:i:s');
            $kategori->save();

            DB::commit();

            return $kategori;
        } catch (\Throwable $th) {
            DB::rollback();

            report($th);
            throw new InvalidException($th->getMessage());
        }
    }

    public function destroy($kategori)
    {
        DB::beginTransaction();

        try {
            $kategori->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            report($th);
            throw new InvalidException($th->getMessage());
        }
    }

}
