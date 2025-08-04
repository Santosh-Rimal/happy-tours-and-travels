<?php

namespace App\Models\Backend;

use App\Models\Backend\TripDetail;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
   protected $fillable=['trip_detail_id','highlights'];



   public function tripDetail()
    {
        return $this->belongsTo(TripDetail::class);
    }

   
   protected $casts = [
   'highlights' => 'array',
   ];
}