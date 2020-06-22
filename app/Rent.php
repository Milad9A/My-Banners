<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $guarded = [];

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }
}
