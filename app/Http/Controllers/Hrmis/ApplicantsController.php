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

// location models
use App\Models\Location\Region as Region;
use App\Models\Location\Province as Province;
use App\Models\Location\Municipality as Municipality;
use App\Models\Location\Barangay as Barangay;

class ApplicantsController extends Controller
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

    public function getRegions() {
        $regions = Region::all();
        return response()->json([
            'regions' => $regions,
        ]);
    }

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
        /**
         * Data in array form:
         *      programs
         *      abbreviation
         *      schools
         *      year graduated
         */

        /*
        if(!empty($request->training_titles)) {
            return response()->json(["response" => "NOT EMPTY"]);
        } else {
            return response()->json(["response" => "NOT EMPTY"]);
        }
        */

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

        if ( !empty($request->programs) ) {
            $programsCount = count($request->programs);

            for($i=0; $i<$programsCount; $i++) {
                if($request->programs[$i] != "") {
                    $education = new Education;

                    $education->program = $request->programs[$i];
                    $education->acronym = $request->acronyms[$i];
                    $education->school = $request->schools[$i];
                    $education->year_graduated = $request->years_graduated[$i];

                    $education->hasApplicant()->associate($applicant);
                    $education->save();
                }
            }
        }

        if ( !empty($request->training_titles) ) {
            $trainingsCount = count($request->training_titles);

            for($i=0; $i<$trainingsCount; $i++) {
                if($request->training_titles[$i] != "") {
                    $training = new Training();

                    $training->title         = $request->training_titles{$i};
                    $training->conducted_by  = $request->conducted_by[$i];
                    $training->hours         = $request->training_hours[$i];
                    $training->from_date     = $request->from_date_training[$i];
                    $training->to_date       = $request->to_date_training[$i];
                    $training->hasApplicant()->associate($applicant);
                    $training->save();
                }
            }
        }

        if ( !empty($request->work_positions) ) {
            $workPositionsCount = count($request->work_positions);

            for($i=0; $i<$workPositionsCount; $i++) {
                if($request->work_positions[$i] != "") {
                    $experience = new Experience;

                    $experience->position       = $request->work_positions[$i];
                    $experience->agency         = $request->work_agencies[$i];
                    $experience->salary_grade   = $request->salary_grade[$i];
                    $experience->from_date      = $request->from_date_agency[$i];
                    $experience->to_date        = $request->to_date_agency[$i];
                    $experience->hasApplicant()->associate($applicant);
                    $experience->save();
                }
            }
        }

        if ( !empty($request->title_eligibilities) ) {
            $eligibilitiesCount = count($request->title_eligibilities);

            for($i=0; $i<$eligibilitiesCount; $i++) {
                if($request->title_eligibilities[$i] != "") {
                    $eligibility = new Eligibility;

                    $eligibility->title          = $request->title_eligibilities[$i];
                    $eligibility->license_number = $request->license_numbers[$i];
                    $eligibility->rating         = $request->ratings[$i];
                    $eligibility->exam_date      = $request->exam_date[$i];
                    $eligibility->hasApplicant()->associate($applicant);
                    $eligibility->save();
                }
            }
        }

        /*foreach ($request->attachment as $attached) {

            $filename            = $attached->getClientOriginalName();
            $destinationPath     = 'upload/applicants/'.'applicant_no_'.$applicant['id'];

            $file                = new FileApplicant();
            $file->filename      = $filename;
            $file->path          = $destinationPath;
            $file->hasApplicant()->associate($applicant);

            $attached->move($destinationPath, $filename);
            $file->save();
        }*/

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
        $applicant = Applicants::findOrFail($id);
        
        return view('hrmis.applicants.edit', compact('applicant'));
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
        $applicant = Applicants::findOrFail($id);
        $applicant->date_of_application = $request['date_of_application'];
        $applicant->date_received = $request['date_received'];
        $applicant->firstname = $request['firstname'];
        $applicant->middlename = $request['middlename'];
        $applicant->lastname = $request['lastname'];
        $applicant->save();

        return redirect()->route('applicants.show', ['applicant' => $applicant->id ]);
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
