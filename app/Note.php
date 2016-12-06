<?php

namespace WebNote;

use Illuminate\Database\Eloquent\Model;


class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'auteur', 'updated_at'
    ];

    public function path()
    {
        return route('notes.show', ['id' => $this->id]);
    }

    public function members()
    {
        return $this->belongsToMany('WebNote\User')->orderBy('name');
    }

    public function groups()
    {
        return null;
    }

    public function releases()
    {
      return $this->hasMany('WebNote\NoteRelease')->orderBy('updated_at', 'desc');
    }
}
