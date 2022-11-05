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
        $benchTime = Benchmark::measure(fn() => Data::create($request->validated()));
        $data->benchTime = $benchTime;
        return new DataResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
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
