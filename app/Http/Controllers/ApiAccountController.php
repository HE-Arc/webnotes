<?php

namespace WebNote\Http\Controllers;

// use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use WebNote\Http\Requests;
use WebNote;

use WebNote\User;

class ApiAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(WebNote\User::all());
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
      return response()->json(WebNote\User::find($id));
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

      // Validation
      $this->validate($request, [
          'name'              => 'required',
          'email'           => 'required'
      ]);

      // Update the group
      $user = WebNote\User::find($id);
      $user->update($request->all());
      $avatar = null;
      if ($request->hasFile('avatar')) {
          $avatar = $request->file('avatar')->store('users_avatar', 'public');
      }
      $user->avatar= $avatar;
      $user->save();
      return response()->json($user);
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

    public function groups($id)
    {
      return response()->json(WebNote\User::find($id)->groups()->get());
    }

    public function notes($id){
        $notes = WebNote\User::find($id)->notes()->get();
        foreach (WebNote\User::find($id)->groups() as $key => $value) {
          $notes = $notes->merge($value->groups()->get());
        }
        return response()->json($notes);
    }

    public function authUser(Request $request)
    {
      $user = WebNote\User::where([['email', '=', $request->email],['name', '=', $request->name]])->first();
      return response()->json($user);
    }
}
