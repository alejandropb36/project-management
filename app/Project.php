<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Table
    protected $table = 'projects';

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('user_role')->withTimestamps();
    }

}
