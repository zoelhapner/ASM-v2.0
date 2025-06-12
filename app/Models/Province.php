<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function Country() {
        return $this->belongsTo(Country::class);
    }

    public function Cities() {
        return $this->hasMany(City::class);
    }

    public function Licenses() {
        return $this->hasMany(License::class);
    }
}
