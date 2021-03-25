<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Theme extends Model implements HasMedia
{
    use HasFactory;
     use InteractsWithMedia;

      public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

     public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
