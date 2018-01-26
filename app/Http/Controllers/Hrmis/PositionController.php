<?php

namespace App\Http\Controllers\Hrmis;

use App\Models\Hrmis\PositionHiring;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hrmis.positions.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrmis\PositionHiring  $positionHiring
     * @return \Illuminate\Http\Response
     */
    public function show(PositionHiring $positionHiring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrmis\PositionHiring  $positionHiring
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionHiring $positionHiring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrmis\PositionHiring  $positionHiring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PositionHiring $positionHiring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrmis\PositionHiring  $positionHiring
     * @return \Illuminate\Http\Response
     */
    public function destroy(PositionHiring $positionHiring)
    {
        //
    }
}
