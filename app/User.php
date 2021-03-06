<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'nick', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function homeworks()
    {
        return $this->hasMany('App\Homework');
    }

    public function projects(){
        return $this->belongsToMany(Project::class)->withPivot('user_role')->withTimestamps();
    }

    public function getNameAttribute($value)//Accesor
    {
        return strtoupper($value);
    }
    public function getNickAttribute($value)//Accesor
    {
        return strtoupper($value);
    }
}
