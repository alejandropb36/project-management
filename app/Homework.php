<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    // Table
    protected $table = 'homeworks';
    
    protected $guarded = ['id'];
    
    protected $fillable = [
        'name',
        'description',
        'status'
    ];
}
