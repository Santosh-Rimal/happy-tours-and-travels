<?php

namespace App\Models\Backend;

use App\Models\Backend\TripDetail;
use Illuminate\Database\Eloquent\Model;

class NotIncluded extends Model
{
    protected $guarded=[];
    public function tripDetail()
    {
        return $this->belongsTo(TripDetail::class);
    }
    protected $casts = [
    'notincludes' => 'array',
    ];
}