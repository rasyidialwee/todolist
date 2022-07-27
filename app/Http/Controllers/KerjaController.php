<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKerjaRequest;
use App\Http\Requests\UpdateKerjaRequest;
use App\Models\Kerja;

class KerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKerjaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kerja  $kerja
     * @return \Illuminate\Http\Response
     */
    public function show(Kerja $kerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kerja  $kerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Kerja $kerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKerjaRequest  $request
     * @param  \App\Models\Kerja  $kerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKerjaRequest $request, Kerja $kerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kerja  $kerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kerja $kerja)
    {
        //
    }
}
