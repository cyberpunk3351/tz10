<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use App\Http\Resources\DataResource;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataResource::collection(Data::all());


    }

    public function store(DataRequest $request)
    {
//        dd($request);

        $data = Data::create($request->validated());

//        dd(json_encode($data));

        $benchTime = Benchmark::measure(fn() => $data);
        $data->benchTime = $benchTime;

        return new DataResource(json_decode($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data): \Illuminate\Http\Response|DataResource
    {
        return new DataResource($data);
    }


    /**
     * @param DataRequest $request
     * @param Data $data
     * @return DataResource
     */
    public function update(DataRequest $request, Data $data): DataResource
    {
        $data->update($request->validated());
        return new DataResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }
}
