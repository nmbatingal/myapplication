<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Offices;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users   = User::orderBy('firstname', 'ASC')->get();

        return view('accounts.users.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return response()->json($user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $offices = Offices::orderBy('div_name', 'ASC')->get();
        $roles   = Role::get();

        return view('accounts.users.update', compact('user', 'offices', 'roles'));
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
        $user = User::findOrFail($id);

        $user->firstname       = $request['u_fname'];
        $user->middlename      = $request['u_mname'];
        $user->lastname        = $request['u_lname'];
        $user->email           = $request['u_email'];
        $user->mobile_number   = $request['u_contact'];
        $user->div_unit        = $request['u_unit'];
        $user->position        = $request['u_position'];

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAccountSettings(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->__isActive = $request['u_active'] ? 1 : 0;
        $user->__isAdmin  = $request['u_admin']  ? 1 : 0;

        $roles = $request['roles'];
        $user->save();

        if (isset($roles)) {        
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        }        
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        return redirect()->route('users.index');
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

    public function resetPassword($id) 
    {
        $user = User::findOrFail($id);

        $user->password = bcrypt('dostcaraga');
        $user->save();

        return response()->json("success");
    }

    /*** SHOW PROFILE ***/
    public function profile($id)
    {
        $user   = User::find($id);
        $offices = Offices::orderBy('div_name', 'ASC')->get();

        return view('accounts.profile', compact('user', 'offices'));
    }

    /*** SHOW PROFILE ***/
    public function profileUpdate(Request $request, $id)
    {
        $user   = User::find($id);

        $user->lastname      = $request['u_lname'];
        $user->firstname     = $request['u_fname'];
        $user->middlename    = $request['u_mname'];
        $user->email         = $request['u_email'];
        $user->mobile_number = $request['u_contact'];
        $user->div_unit      = $request['u_unit'];
        $user->position      = $request['u_position'];
        $user->save();

        return redirect()->route('home')->with('info', 'Account successfully updated!');
    }

    /*** SHOW PROFILE ***/
    public function profilePasswordUpdate(Request $request, $id)
    {
        $user   = User::find($id);

        $user->password = bcrypt($request['u_password']);
        $user->save();

        return redirect()->route('home')->with('success', 'Password successfully updated!');
    }
}