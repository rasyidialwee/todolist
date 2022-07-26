<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSenaraiRequest;
use App\Http\Requests\UpdateSenaraiRequest;
use App\Models\Senarai;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SenaraiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $senarais = $user->senarais;

        return inertia('Senarai/Index', [
            'senarais' => $senarais,
        ]);
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
     * @param  \App\Http\Requests\StoreSenaraiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenaraiRequest $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|string|max:10',
        //     'description' => 'required|string'
        // ]);
        $user = auth()->user();

        $senarai = new Senarai();
        $senarai->uuid = Str::uuid();
        $senarai->name = $request->name;
        $senarai->description = $request->description;
        $senarai->user_id = $user->id;
        $senarai->save();

        return $senarai;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Senarai  $senarai
     * @return \Illuminate\Http\Response
     */
    public function show(Senarai $senarai)
    {
        $this->authorize('view', $senarai);

        return inertia('Senarai/Show', [
            'senarai' => $senarai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenaraiRequest  $request
     * @param  \App\Models\Senarai  $senarai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenaraiRequest $request, Senarai $senarai)
    {
        $senarai->name = $request->name;
        $senarai->description = $request->description;
        $senarai->save();

        return $senarai;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Senarai  $senarai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Senarai $senarai)
    {
        return $senarai->delete();
    }
}
