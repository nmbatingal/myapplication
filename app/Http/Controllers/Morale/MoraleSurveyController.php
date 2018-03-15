<?php

namespace App\Http\Controllers\Morale;

use Auth;
use Excel;
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
        $semester        = Semestral::orderBy('id', 'DESC')->get();
        $total_questions = Questions::all();
        $divisions       = ['ORD', 'FAS', 'FOD', 'TSS'];
        $div_oi          = [];
        $question_oi     = [];

        if ( !$semester->isEmpty() )
        {
            $overall_index   = Rating::overallIndex($semester[0]['id']);
            array_push($div_oi, $overall_index);

            foreach ($divisions as $div) {
                $value = Rating::overallDivisionIndex( $semester[0]['id'], $div);
                array_push($div_oi, $value);
            }

            foreach ($total_questions as $question) {
                $value         = Rating::overallQuestionIndex( $semester[0]['id'], Auth::user()->div_unit, $question['id']);
                $question_oi[] =    [
                                        'question'   => $question['text_question'],
                                        'answer'     => $value,
                                    ];
            }
        } else {
            $div_oi = [0,0,0,0,0];
            $question_oi = [['question' => 0, "answer" => 0]];
        }
        
        return view('morale.index', compact('semester', 'div_oi', 'question_oi'));
    }

    public function showOiPerQuestion($div)
    {
        $semester        = Semestral::orderBy('id', 'DESC')->get();
        $total_questions = Questions::all();
        $div_oi          = [];
        $question_oi     = [];

        if ( !$semester->isEmpty() )
        {
            foreach ($total_questions as $question) {
                $value         = Rating::overallQuestionIndex( $semester[0]['id'], $div, $question['id']);
                $question_oi[] =    [
                                        'question'   => $question['text_question'],
                                        'answer'     => $value,
                                    ];
            }
        } else {
            $div_oi = [0,0,0,0,0];
            $question_oi = [['question' => 0, "answer" => 0]];
        }

        return view('morale.modal-question', compact('div', 'question_oi'))->render();
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

        //return $request->all();
        return redirect('hrmis/morale');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $survey_notif = new Notification;
        $survey_notif->sem_id  = $request['sem_id'];
        $survey_notif->user_id = $request['user_id'];
        $survey_notif->div_id  = $request['div_id'];

        if ( $survey_notif->save() )
        {
            foreach ($request->q_id as $q_id) {
                $survey = new Survey;

                $survey->user_id     = $request['user_id'];
                $survey->question_id = $q_id;
                $survey->score       = $request['qn_'.$q_id];
                $survey->semestral_id = $request['sem_id'];
                $survey->save();
            }
        }

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

    public function excel($type, $user)
    {
        //$questions = Questions::get()->toArray();

        /*$semester  = Semestral::orderBy('id', 'DESC')->get()->toArray();*/
        $semester        = Semestral::orderBy('id', 'ASC')->first();
        $total_questions = Questions::all();

        $divisions       = ['ORD', 'FAS', 'FOD', 'TSS'];
        $div_oi          = [];
        $question_oi     = [];

        if ( $semester->count() > 0 )
        {
            $overall_index   = Rating::overallIndex($semester['id']);
            array_push($div_oi, [ 'office' => 'OI', 'index' => $overall_index]);

            foreach ($divisions as $div) {
                $value = Rating::overallDivisionIndex( $semester['id'], $div);
                array_push($div_oi, [ 'office' => $div, 'index' => $value]);
            }

            foreach ($total_questions as $question) {
                //$value         = Rating::overallQuestionIndex( $semester[0]['id'], Auth::user()->div_unit, $question['id']);
                
                $value         = Rating::overallQuestionIndex( $semester['id'], 'Overall Index', $question['id']);
                $question_oi[] =    [
                                        'question'   => $question['text_question'],
                                        'answer'     => $value,
                                    ];
            }
        }
        
        //return view('morale.index', compact('semester', 'div_oi', 'question_oi'));

        return view('morale.export.question', compact('semester', 'div_oi', 'question_oi'));



        /*return Excel::create('Questions', function($excel) use ($questions, $semester) {

            $excel->sheet('Question Details', function($sheet) use ($questions, $semester)
            {
                $sheet->loadView('morale.export.question', [ 'semester' => $semester ]);
            });

        })->export('xlsx'); */
    }
}
