<?php

namespace WebNote\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\AbstractUriElement;
use WebNote\Http\Requests;

use WebNote;

use WebNote\Group;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('groups.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Nouveau groupe";
        return view('groups.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group($request->all());
        $icon = null;
        if($request->file('icon') === "") {
            $icon = $request->file('icon')->store('groups_icon', 'public');
        }
        $group->icon = $icon;
        $group->save();

        return redirect('/group');
    }

    /**
     * Display the specified resource.
     *
     * @param $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edition du groupe";
        $group = WebNote\Group::find($id);
        return view('groups.edit', compact('group', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = WebNote\Group::find($id);
        $group->update($request->all());
        $icon = null;
        if($request->file('icon') != "") {
            $icon = $request->file('icon')->store('groups_icon', 'public');
        }
        $group->icon = $icon;
        $group->save();


        return $group;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function users(Request $request)
    {
        $users = WebNote\User::where('name', 'like', '%'.$request->term.'%')->get();
        return Response::json($users);
    }
}
