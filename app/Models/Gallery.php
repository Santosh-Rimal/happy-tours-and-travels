<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'image', 'caption'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($gallery) {
            if ($gallery->image && \Storage::disk('public')->exists($gallery->image)) {
                \Storage::disk('public')->delete($gallery->image);
            }
        });
    }
}
