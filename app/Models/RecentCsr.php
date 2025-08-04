<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentCsr extends Model
{
    /** @use HasFactory<\Database\Factories\RecentCsrFactory> */
    use HasFactory;

    protected $fillable = [
    'title',
    'description',
    'image',
    ];
}