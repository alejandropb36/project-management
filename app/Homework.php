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


    
    public function scopeStatus($query, $status)
    {
        if($status)
            return $query->where('status', 'LIKE', "%$status%");//%% cualquier cosa que contiene lo que esta dentro del porcentaje
    }
}
