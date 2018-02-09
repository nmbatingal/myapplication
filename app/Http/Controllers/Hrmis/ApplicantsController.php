<?php

namespace App\Http\Controllers\Hrmis;

use Auth;
use App\Models\Hrmis\Applicants as Applicants;
use App\Models\Hrmis\ApplicantEducation as Education;
use App\Models\Hrmis\ApplicantTraining as Training;
use App\Models\Hrmis\ApplicantExperience as Experience;
use App\Models\Hrmis\ApplicantEligibility as Eligibility;
use App\Models\Hrmis\ApplicantAttachment as FileApplicant;
use App\Models\Hrmis\PositionHiring as Positions;
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
        return view('hrmis.applicants.index');
    }

    public function showApplicants()
    {
        $applicants = Applicants::orderBy('lastname', 'ASC')->get();
        $positions  = Positions::orderBy('title', 'ASC')->get();
        return view('hrmis.applicants.applicants', compact('applicants', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrmis.applicants.create');
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

        $applicant->lastname    = $request['lastname'];
        $applicant->firstname   = $request['firstname'];
        $applicant->middlename  = $request['middlename'];
        $applicant->contact_number = $request['contact_number'];
        $applicant->age         = $request['age'];
        $applicant->sex         = $request['sex'];
        $applicant->email       = $request['email'];
        $applicant->log_id      = Auth::user()->id;
        $applicant->remarks     = nl2br($request['remarks']);
        $applicant->save();

        if ( !empty($request['program']) ) {
            $education = new Education();

            $education->program         = $request['program'];
            $education->acronym         = $request['acronym'];
            $education->school          = $request['school'];
            $education->year_graduated  = $request['year_graduated'];
            $education->hasApplicant()->associate($applicant);
            $education->save();
        }

        if ( !empty($request['training_title']) ) {
            $training = new Training();

            $training->title         = $request['training_title'];
            $training->conducted_by  = $request['conducted_by'];
            $training->hours         = $request['training_hours'];
            $training->from_date     = $request['from_date_training'];
            $training->to_date       = $request['to_date_training'];
            $training->hasApplicant()->associate($applicant);
            $training->save();
        }

        if ( !empty($request['work_position']) ) {
            $experience = new Experience();

            $experience->position       = $request['work_position'];
            $experience->agency         = $request['work_agency'];
            $experience->salary_grade   = $request['salary_grade'];
            $experience->from_date      = $request['from_date_agency'];
            $experience->to_date        = $request['to_date_agency'];
            $experience->hasApplicant()->associate($applicant);
            $experience->save();
        }

        if ( !empty($request['title_eligibility']) ) {
            $eligibility = new Eligibility();

            $eligibility->title          = $request['title_eligibility'];
            $eligibility->license_number = $request['license_number'];
            $eligibility->rating         = $request['rating'];
            $eligibility->exam_date      = $request['exam_date'];
            $eligibility->hasApplicant()->associate($applicant);
            $eligibility->save();
        }

        foreach ($request->attachment as $attached) {

            $filename            = $attached->getClientOriginalName();
            $destinationPath     = 'upload/applicants/'.'applicant_no_'.$applicant['id'];

            $file                = new FileApplicant();
            $file->filename      = $filename;
            $file->path          = $destinationPath;
            $file->hasApplicant()->associate($applicant);

            $attached->move($destinationPath, $filename);
            $file->save();
        }

        return redirect()->route('applicants.showApplicants')->with('info', 'Applicant Information Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicants::findOrFail($id);
        
        return view('hrmis.applicants.view', compact('applicant'));
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
