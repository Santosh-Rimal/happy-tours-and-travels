<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateResponsibility extends Model
{
    /** @use HasFactory<\Database\Factories\CorporateResponsibilityFactory> */
    use HasFactory;
    protected $fillable=['title','description'];
}