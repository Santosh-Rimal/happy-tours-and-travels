<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Safty extends Model
{
    protected $fillable=['title','requirements'];

    protected $casts=[
        'requirements'=>'array',
    ];
}