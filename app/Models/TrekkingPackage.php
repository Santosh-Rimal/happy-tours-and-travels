<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrekkingPackage extends Model
{
    protected $fillable = [
    'title',
    'tips',
    'requirements',
    ];

    protected $casts = [
    'requirements' => 'array',
    'tips' => 'array',
    ];
}