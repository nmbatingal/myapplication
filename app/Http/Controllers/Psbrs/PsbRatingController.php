<?php

namespace App\Http\Controllers\Psbrs;

use App\Models\Hrmis\ApplicantLineup as ApplicantLineup;
use App\Models\Hrmis\ApplicantLineupGroup as ApplicantLineupGroup;
use App\Models\Psbrs\PsbRating as Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PsbRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('psboard.index');
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
        $rating = new Rating();

        $rating->lineup_applicant_id = $request['applicant_id'];
        $rating->psb_id = $request['psb_id'];
        $rating->rate_education = $request['education'];
        $rating->rate_training = $request['training'];
        $rating->rate_experience = $request['experience'];
        $rating->rate_character = $request['character'];
        $rating->rate_comm_skills = $request['communication_skills'];
        $rating->rate_special_skills = $request['special_skills'];
        $rating->rate_special_award = $request['award'];
        $rating->rate_potential  = $request['potential'];
        $rating->remarks         = $request['remarks'];
        $rating->save();

        if ($rating) {
            return 'success';
        }

        return 'failed';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
