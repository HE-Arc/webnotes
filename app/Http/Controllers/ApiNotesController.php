<?php

namespace WebNote\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Symfony\Component\DomCrawler\AbstractUriElement;
use WebNote\Http\Requests;
use WebNote;
use WebNote\User;
use WebNote\Note;

class ApiNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(WebNote\Note::all());
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
      // Validation
      $this->validate($request, [
          'title'             => 'required',
          'member'           => 'required'
      ]);

      $note = new WebNote\Note($request->all());
      $note->save();

      $note->releases()->create($request->all());

      $note->users()->attach($request->member, ['permission' => 1]);

      return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(WebNote\Note::find($id)->release());
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

        // Update the group
        $release = WebNote\NoteRelease::find($id);
        $note = WebNote\Note::find($release->note_id);

        $values = $request->all();
        $values['auteur'] = $note->auteur;
        $values['title'] = $note->title;
        $values['description'] = $note->description;
        $note->releases()->create($values);

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
}
