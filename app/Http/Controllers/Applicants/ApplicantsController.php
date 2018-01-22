<?php

namespace App\Http\Controllers\Applicants;

use App\Models\Hrmis\Applicants as Applicants;
use App\Models\Hrmis\ApplicantEducation as Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hrmis.index');
    }

    public function showApplicants()
    {
        $applicants = Applicants::orderBy('lastname', 'ASC')->get();
        return view('hrmis.applicants', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrmis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $applicant = new Applicants();

        $applicant->lastname  = $request['lastname'];
        $applicant->firstname = $request['firstname'];
        $applicant->middlename = $request['middlename'];
        $applicant->contact_number = $request['contact_number'];
        $applicant->email = $request['email'];
        $applicant->save();

        if ( !empty($request['program']) ) {
            $education             = new Education();

            $education->program         = $request['program'];
            $education->school          = $request['school'];
            $education->year_graduated  = $request['year_graduated'];
            $education->hasApplicant()->associate($applicant);
            $education->save();
        }

        return redirect()->route('hrmis.applicants')->with('info', 'created');
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
