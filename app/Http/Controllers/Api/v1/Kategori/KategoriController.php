<?php

namespace App\Http\Controllers\Api\v1\Kategori;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Kategori\KategoriStoreRequest;
use App\Http\Requests\Kategori\KategoriUpdateRequest;

use App\Models\Kategori;
use App\Services\Kategori\KategoriService;

class KategoriController extends Controller
{
    public function __construct(
        protected KategoriService $service
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->service->index();

        return responder()->success($data)->respond();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriStoreRequest $request)
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
    public function show(Kategori $kategori)
    {
        $response = [
            'kategori' => $kategori,
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
    public function update(KategoriUpdateRequest $request, Kategori $kategori)
    {
        $input = $request->validated();

        $this->service->update($request, $input, $kategori);

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
    public function destroy(Kategori $kategori)
    {
        $this->service->destroy($kategori);

        $response = [
            'message' => 'Data deleted successfully',
        ];

        return responder()->success($response)->respond();
    }
}
