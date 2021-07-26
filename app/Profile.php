<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function sensors()
    {
        return $this->belongsToMany('\App\Sensor')
            ->withPivot('value')
            ->withTimestamps();
    }
}
