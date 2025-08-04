<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable = [
    'title',
    'description',
    'requirements',
    ];

    protected $casts = [
    'requirements' => 'array',
    ];
}