<?php

namespace App\Models;

use App\Models\Backend\TripDetail;
use Illuminate\Database\Eloquent\Model;

class CustomizeTrip extends Model
{
    protected $fillable=['name','email','phone','country','trip_id','group_size','preferred_start_date','duration','budget','message'];


     public function tripDetail()
     {
     return $this->belongsTo(TripDetail::class);
     }
}