<?php

namespace App\Http\Controllers\Psbrs;

use Auth;
use Carbon;
use App\Models\Hrmis\ApplicantLineup as ApplicantLineup;
use App\Models\Hrmis\ApplicantLineupGroup as ApplicantLineupGroup;
use App\Models\Psbrs\PsbRating as PsbRating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectionLineupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lineups = ApplicantLineup::all();

        return view('psboard.lineup.index', compact('lineups'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interviewee = ApplicantLineupGroup::find($id);
        $ratings     = PsbRating::where( 'lineup_applicant_id', $id )->orderBy('created_at', 'ASC')->get();
        $psb_rating  = PsbRating::where( 'lineup_applicant_id', $id )
                                ->where( 'psb_id', Auth::user()->id )
                                ->first();

        return view('psboard.lineup.show', compact('interviewee', 'ratings', 'psb_rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
