<?php

namespace WebNote;

use Illuminate\Database\Eloquent\Model;


class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'icon'
    ];

    public function path()
    {
        return "/group/" . $this->id;
    }

    public function members()
    {
        return $this->belongsToMany('WebNote\User')->orderBy('name');
    }

    public function notes()
    {
        return null;
    }


}
