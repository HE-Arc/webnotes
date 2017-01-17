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

    public function members()
    {
        return $this->belongsToMany('WebNote\User')->orderBy('name');
    }

    public function notes()
    {
        return $this->belongsToMany('WebNote\Note')->withPivot('permission')->orderBy('title');
    }

    public function canModifyNote($id) {
        return $this->belongsToMany('WebNote\Note')->withPivot('permission')->find($id)->pivot->permission;
    }
}
