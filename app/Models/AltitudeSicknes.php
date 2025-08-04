<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AltitudeSicknes extends Model
{
   protected $fillable = ['title', 'mild_symptoms', 'severe_symptoms'];

   protected $casts=[
    'mild_symptoms'=>'array', 
    'severe_symptoms'=>'array',
   ];
}