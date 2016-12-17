<?php

namespace WebNote;

use Illuminate\Database\Eloquent\Model;


class NoteRelease extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'content', 'auteur', 'note_id'
    ];

    public function path()
    {
        
    }

    public function members()
    {
        return $this->belongsToMany('WebNote\User')->orderBy('name');
    }

    public function groups()
    {
        return null;
    }


}
