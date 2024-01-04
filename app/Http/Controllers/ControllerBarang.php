<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Barang;

class ControllerBarang extends Controller
{

  public function create(Request $request)
  {
    $data = $request->all();
    $barang = Barang::create($data);

    return response()->json($barang);
  }

  public function index()
  {
    $barang = Barang::all();
    return response()->json($barang);
  }

  public function detail($id)
  {
    $barang = Barang::find($id);
    return response()->json($barang);
  }

  public function delete($id)
  {
    $barang = Barang::whereId($id)->first();
    $barang->delete();

    if ($barang) {
      return response()->json([
        'success' => true,
        'message' => 'Data berhasil dihapus'
      ], 200);
    }
  }

  public function update(Request $request, $id)
  {
    $barang = Barang::whereId($id)->update([
      'nama_barang'         => $request->input('nama_barang'),
      'kategori_barang'     => $request->input('kategori_barang'),
      'satuan'              => $request->input('satuan'),
      'harga'               => $request->input('harga'),
      'deskripsi_barang'    => $request->input('deskripsi_barang')
    ]);

    if ($barang) {
      return response()->json([
        'success'   => true,
        'message'   => 'Data berhasil diupdate',
        'data'      => $barang
      ], 201);
    } else {
      return response()->json([
        'success'   => false,
        'message'   => 'Data gagal diupdate'
      ], 400);
    }
  }
}
