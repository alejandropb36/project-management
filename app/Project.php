<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Table
    protected $table = 'projects';

    //Relacion One to many /  de uno a muchos
    public function homeworks()
    {
        return $this->hasMany('App\Homework');
    }
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('user_role')->withTimestamps();
    }
    
}
