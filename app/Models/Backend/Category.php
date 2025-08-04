<?php

namespace App\Models\Backend;

use App\Models\Backend\TripDetail;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];

    public function tripDetail()
    {
        return $this->hasMany(TripDetail::class);
    }
}