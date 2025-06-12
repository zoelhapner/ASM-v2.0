<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function City() {
        return $this->belongsTo(City::class);
    }

    public function Licenses() {
        return $this->hasMany(License::class);
    }
}
