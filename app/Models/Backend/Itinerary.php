<?php

namespace App\Models\Backend;

use App\Models\Backend\TripDetail;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable=['trip_detail_id','title','description'];

    public function tripDetail()
    {
        return $this->belongsTo(TripDetail::class);
    }
}