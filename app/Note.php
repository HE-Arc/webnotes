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
        return "/notes/" . $this->id;
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
