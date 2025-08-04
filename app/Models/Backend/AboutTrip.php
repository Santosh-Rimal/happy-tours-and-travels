<?php

namespace App\Models\Backend;

use App\Models\Backend\TripDetail;
use Illuminate\Database\Eloquent\Model;

class AboutTrip extends Model
{
    protected $fillable=['trip_detail_id','title','trip_description','image'];

     public function tripDetail()
    {
        return $this->belongsTo(TripDetail::class);
    }
}