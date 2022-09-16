<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function advertiser()
    {
        return $this->belongsTo('App\Models\Advertiser');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag','ad_tag');
    }
}
