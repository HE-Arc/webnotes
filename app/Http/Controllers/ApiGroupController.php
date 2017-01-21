<?php

namespace WebNote\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use WebNote\Http\Requests;

use WebNote;

use WebNote\Group;
use WebNote\User;

class ApiGroupController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth', ['except' => 'logout']);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(WebNote\Group::all());
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
        return response()->json(WebNote\Group::find($id));
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
          'members'           => 'required'
      ]);

      // Update the group
      $group = WebNote\Group::find($id);
      $group->update($request->all());
      $icon = null;
      if ($request->hasFile('icon')) {
          $icon = $request->file('icon')->store('groups_icon', 'public');
      }
      $group->icon = $icon;
      $group->members()->detach();
      foreach ($request->members as $mid)
      {
          $group->members()->attach($mid, ['permission' => 1]);
      }
      $group->save();
      return response()->json($request);
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

    /**
     *
     */
    public function users($id)
    {
      $group = WebNote\Group::find($id);
      return response()->json($group->members);
    }

    /**
     *
     */
    public function addUser(Request $request, $id)
    {
      // Validation
      $this->validate($request, [
          'member'           => 'required'
      ]);
      $group = WebNote\Group::find($id);
      $group->members()->attach($request->member, ['permission' => 1]);
      $group->save();
      return response()->json($request);
    }
}
