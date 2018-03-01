<?php

namespace App\Http\Controllers\Morale;

use Auth;
use App\User;
use App\Models\Morale\MoraleSurvey as Survey;
use App\Models\Morale\MoraleSurveyRatings as Rating;
use App\Models\Morale\MoraleSurveyQuestions as Questions;
use App\Models\Morale\MoraleSurveySemestral as Semestral;
use App\Models\Morale\MoraleSurveyNotification as Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MoraleSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('morale.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function semestral()
    {
        $semesters = Semestral::orderBy('id', 'DESC')->get();
        return view('morale.conduct.semester', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function survey($id)
    {
        $semester  = Semestral::find($id)->first();
        $questions = Questions::all();
        $action    = "rate";
        return view('morale.conduct.survey', compact('semester', 'questions', 'action'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeSemestral(Request $request)
    {
        $semester = new Semestral;
        $semester->month_from = $request['month_from'];
        $semester->month_to   = $request['month_to'];
        $semester->year       = $request['year'];
        $semester->save();

        return $request->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->q_id as $q_id) {
            $survey = new Survey;

            $survey->user_id     = $request['user_id'];
            $survey->question_id = $q_id;
            $survey->score       = $request['qn_'.$q_id];
            $survey->semestral_id = $request['sem_id'];
            $survey->save();
        }

        $survey_notif = new Notification;
        $survey_notif->sem_id  = $request['sem_id'];
        $survey_notif->user_id = $request['user_id'];
        $survey_notif->save();

        return redirect()->route('morale.semestral');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $semester  = Semestral::find($id)->first();
        // $questions = Questions::all();
        $ratings   = Rating::ratings($id, Auth::user()->id)->get();
        $action    = "view";

        // return view('morale.conduct.survey', compact(, 'questions', 'action'));
        return view('morale.conduct.survey', compact('semester', 'ratings', 'action'));
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
