<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Table
    protected $table = 'projects';

    public function users(){
        return belongsToMany(User::class);
    }

}
