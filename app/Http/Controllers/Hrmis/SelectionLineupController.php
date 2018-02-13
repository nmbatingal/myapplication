<?php

namespace App\Http\Controllers\Hrmis;

use App\Models\Hrmis\ApplicantLineup as ApplicantLineup;
use App\Models\Hrmis\ApplicantLineupGroup as ApplicantLineupGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectionLineupController extends Controller
{
    public function __construct()
    {
        $this->middleware(['hrMember']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineups = ApplicantLineup::all();
        return view('hrmis.lineup.index', compact('lineups'));
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
        $lineupList = new ApplicantLineup();

        $lineupList->position_id    = $request['position'];
        $lineupList->date_interview = $request['date_interview'];
        $lineupList->save();

        foreach ($request['id'] as $i => $applicant_id) {
            $groupList = new ApplicantLineupGroup();

            $groupList->hasLineup()->associate($lineupList);
            $groupList->applicant_id   = $applicant_id;
            $groupList->save();
        }

        return redirect()->route('lineup.index')->with('info', 'Applicant Lineup Successfully Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = ApplicantLineup::find($id);
        $lineups  = ApplicantLineupGroup::where('lineup_id', $id)->get();

        return view('hrmis.lineup.show', compact('position', 'lineups'))->render();
    }

    public function printLineup($id)
    {
        $position = ApplicantLineup::find($id);
        $lineups  = ApplicantLineupGroup::where('lineup_id', $id)->get();

        return view('hrmis.lineup.print', compact('position', 'lineups'))->render();
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
