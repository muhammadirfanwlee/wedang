<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class ControllerTransaksi extends Controller
{

  public function create(Request $request)
  {
    $data = $request->all();
    $transaksi = Transaksi::create($data);

    return response()->json($transaksi);
  }

  public function index()
  {
    $transaksi = Transaksi::all();
    return response()->json($transaksi);
  }

  public function detail($id)
  {
    $transaksi = Transaksi::find($id);
    return response()->json($transaksi);
  }

  public function delete($id)
  {
    $transaksi = Transaksi::whereId($id)->first();
    $transaksi->delete();

    if ($transaksi) {
      return response()->json([
        'success' => true,
        'message' => 'Data berhasil dihapus'
      ], 200);
    }
  }

  public function update(Request $request, $id)
  {
    $transaksi = Transaksi::whereId($id)->update([
      'nama_user'         => $request->input('nama_user'),
      'nama_barang'     => $request->input('nama_barang'),
      'total_harga'              => $request->input('total_harga'),

    ]);

    if ($transaksi) {
      return response()->json([
        'success'   => true,
        'message'   => 'Data berhasil diupdate',
        'data'      => $transaksi
      ], 201);
    } else {
      return response()->json([
        'success'   => false,
        'message'   => 'Data gagal diupdate'
      ], 400);
    }
  }
}
