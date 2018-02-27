<?php

namespace App\Http\Controllers\Iprs;

use App\Models\Ipcr\Ipcr;
use App\Models\Ipcr\IpcrObjective;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IprsObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function createObjective($id)
    {
        $ipcr = Ipcr::find($id);
        $objectives = IpcrObjective::where('ipcr_id', $id)->get();
        return view('iprs.ipcr-objective.create', compact('ipcr', 'objectives'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titles = $request->title;

        /*foreach ($titles as $i => $title) {

            $ipcr = new IpcrObjective();
            
            $ipcr->ipcr_id  = $request['ipcr_id'];
            $ipcr->is_title = $request->is_title[$i];
            $ipcr->objective = $title;

            $type = $request->type[$i];

            if ( $type == "primary_title" )
            {
                $ipcr->parent = NULL;
            }

            if ( $type == "second_title" )
            {
                $temp         = $parent;
                $ipcr->parent = $temp;
            }

            // store child array
            $child = $request->is_child[$i];
            // check if array is child
            if ( !empty($child) )
            {
                $ipcr->parent = $parent;
            }

            $ipcr->save();
            $parent = $ipcr['id'];
            $temp   = $ipcr['id'];
        }*/
        $ipcr = new IpcrObjective();
            
        $ipcr->ipcr_id   = $request['ipcr_id'];
        $ipcr->is_title  = $request['is_title'];
        $ipcr->objective = $request['title'];
        
        $ipcr->save();

        return $request->type;
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
