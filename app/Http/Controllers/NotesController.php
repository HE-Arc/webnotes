<?php

namespace WebNote\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\AbstractUriElement;
use WebNote\Http\Requests;

use WebNote;

use WebNote\Note;
class NotesController extends Controller
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
        return view('notes.myNotes',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.note');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$note = new Note($request->all());
        $user_id = Auth::user()->id;
        $note = new Note;
        $note->title = $request->title;
        $note->description = $request->description;
        $note->auteur = Auth::user()->name;
        $note->save();
        $note->users()->attach($user_id);

        $values = $request->all();
        $values['auteur'] = Auth::user()->name;
        $note->releases()->create($values);


        return redirect('/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('notes.showNote', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = WebNote\Note::find($id);
        return view('notes.editNote', compact('note'));
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
        $note = WebNote\Note::find($id);
        $values = $request->all();
        $values['auteur'] = Auth::user()->name;
        $values['title'] = $note->title;
        $values['description'] = $note->description;
        $note->releases()->create($values);

        return redirect('notes');
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
