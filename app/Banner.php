<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use phpDocumentor\Reflection\Types\Boolean;

class Banner extends Model
{
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getImageAttribute()
    {
        return $this->attributes['image'] ? "/storage/" . $this->attributes['image'] : 'https://www.fleximums.com/rails/active_storage/blobs/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBbk1HIiwiZXhwIjpudWxsLCJwdXIiOiJibG9iX2lkIn19--0725fc0328bc750a0fcc18a18ffde9bcca5b8dff/img-placeholder.jpg';
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function currentlyBeingRented()
    {
        $b = $this->rents->last()->renting_began_at;
        $e = $this->rents->last()->renting_ends_at;
        return ($b < NOW() && $e > NOW()) && $b && $e;
    }

    public function currentlyAvailable()
    {
        return $this->available;
    }
}
