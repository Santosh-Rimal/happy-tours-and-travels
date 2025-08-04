<?php

namespace App\Models\Backend;

use App\Models\Backend\Category;
use App\Models\Backend\Included;
use App\Models\Backend\AboutTrip;
use App\Models\Backend\Highlight;
use App\Models\Backend\Itinerary;
use PhpParser\Node\Expr\Include_;
use App\Models\Backend\NotIncluded;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\UsefulInformation;

class TripDetail extends Model
{
    protected $fillable = [
        'category_id',
        'trip_name',
        'trip_slug',
        'destination',
        'trip_style',
        'food',
        'transportation',
        'accommodation',
        'group_size',
        'trip_duration',
        'trip_difficulty',
        'trip_price',
        'max_elevation',
        'trip_description',
        'sliderimage',
    ];

    public function highlights()
    {
        return $this->hasMany(Highlight::class);
    }

    public function aboutTrip()
    {
        return $this->hasMany(AboutTrip::class);
    }

    public function itineray()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function includes()
    {
        return $this->hasMany(Included::class);
    }

    public function notincludes()
    {
        return $this->hasMany(NotIncluded::class);
    }

    public function usefilinformation()
    {
        return $this->hasMany(UsefulInformation::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}