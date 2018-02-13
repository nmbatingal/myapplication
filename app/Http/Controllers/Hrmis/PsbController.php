<?php

namespace App\Http\Controllers\Hrmis;

use App\Models\Hrmis\PsboardMembers as Psb;
use App\User as User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PsbController extends Controller
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
        $users       = User::orderBy('lastname', 'ASC')->get();
        $psb_members = Psb::all();

        return view('hrmis.psb.index', compact('users', 'psb_members'));
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
        $psb_member = new Psb();
        $psb_member->user_id     = $request['member'];
        $psb_member->acronym     = $request['acronym'];
        $psb_member->designation = $request['designation'];
        $psb_member->save();

        return redirect()->route('psb.index')->with('info', 'PSB Member Added Successfully!');
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
