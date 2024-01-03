<?php

namespace App\Http\Controllers\Api\v1\Produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Produk\ProdukStoreRequest;
use App\Http\Requests\Produk\ProdukUpdateRequest;

use App\Models\Produk;
use App\Services\Produk\ProdukService;

class ProdukController extends Controller
{
    public function __construct(
        protected ProdukService $service
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->service->index($request);

        $response = [
            'products' => $data,
        ];

        return responder()->success($response)->respond();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukStoreRequest $request)
    {
        $input = $request->validated();

        $this->service->store($request, $input);

        $response = [
            'message' => 'Data created successfully',
        ];

        return responder()->success($response)->respond(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $product)
    {
        $response = [
            'product' => $product,
        ];

        return responder()->success($response)->respond();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukUpdateRequest $request, Produk $product)
    {
        $input = $request->validated();

        $this->service->update($request, $input, $product);

        $response = [
            'message' => 'Data updated successfully',
        ];

        return responder()->success($response)->respond();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $product)
    {
        $this->service->destroy($product);

        $response = [
            'message' => 'Data deleted successfully',
        ];

        return responder()->success($response)->respond();
    }
}
