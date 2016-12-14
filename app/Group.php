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

    public function getIconAttribute($value)
    {
        $icon = $value;
        if($icon == null) {
           $icon = "/groups_icon/group_default.png";
        }

        return $icon;
    }

    public function setIconAttribute($value)
    {
        if($value != null) {
            $this->attributes['icon'] = $value;
        }
    }

    public function path()
    {
        return route('group.show', ['id' => $this->id]);
    }

    public function members()
    {
        return $this->belongsToMany('WebNote\User');
    }

    public function notes()
    {
        return $this->belongsToMany('WebNote\Note');
    }


}
