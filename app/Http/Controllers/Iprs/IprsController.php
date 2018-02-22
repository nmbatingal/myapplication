<?php

namespace App\Http\Controllers\Iprs;

use App\Offices;
use App\Models\Ipcr\Ipcr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IprsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('iprs.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTwo()
    {
        $ipcrs = Ipcr::userIpcr()->get();
        return view('iprs.ipcr.index', compact('ipcrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices = Offices::orderBy('div_name', 'ASC')->get();
        return view('iprs.ipcr.create', compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $ipcr = Ipcr::create($request->all());
            return redirect()->route( 'objective.createObjective', ['id' => $ipcr['id']] );

        }
        catch (\Exception $e) {

            return $e->getMessage();

        }
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
