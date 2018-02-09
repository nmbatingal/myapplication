<?php

namespace App\Http\Controllers\Hrmis;

use App\Models\Hrmis\PositionHiring as Position;
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
        $positions = Position::orderBy('title', 'ASC')->get();
        return view('hrmis.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrmis.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $position = new Position();
        
        $position->title              = $request['title'];
        $position->acronym            = $request['acronym'];
        $position->slots              = $request['slots'];
        $position->sal_grade          = $request['sal_grade'];
        $position->item_no            = $request['item_no'];
        $position->publication_no     = $request['publication_no'];
        $position->education_reqs     = nl2br($request['education_req']);
        $position->experience_reqs    = nl2br($request['experience_req']);
        $position->training_reqs      = nl2br($request['training_req']);
        $position->eligibilities      = nl2br($request['eligibility_req']);

        $position->save();

        return redirect()->route('positions.index')->with('info', 'Position successfully added.');
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
