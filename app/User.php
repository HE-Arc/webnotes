<?php

namespace WebNote;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarAttribute($value)
    {
        $avatar = $value;
        if($avatar == null) {
            $avatar = "/users_avatar/user_default.png";
        }

        return $avatar;
    }

    public function setAvatarAttribute($value)
    {
        if($value != null) {
            $this->attributes['avatar'] = $value;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('WebNote\Group');
    }

    public function notes()
    {
        return $this->belongsToMany('WebNote\Note');
    }

    public function canModifyGroup($id)
    {
        return $this->belongsToMany('WebNote\Group')->withPivot('permission')->find($id)->pivot->permission;
    }

    public function canModifyNote($id) {
        return $this->belongsToMany('WebNote\Note')->withPivot('permission')->find($id)->pivot->permission;
    }

    public function lastNote(){
        return Note::all()->last()->releases()->first();
    }

    public function lastGroup(){
        return Group::all()->last();
    }
}
