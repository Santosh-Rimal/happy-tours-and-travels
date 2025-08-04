<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Included extends Model
{
    protected $fillable=['trip_detail_id','includes'];

    public function tripDetail()
    {
        return $this->belongsTo(TripDetail::class);
    }
    protected $casts = [
    'includes' => 'array',
    ];
}