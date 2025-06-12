<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function Province() {
        return $this->belongsTo(Province::class);
    }

    public function Districts() {
        return $this->hasMany(District::class);
    }

    public function Licenses() {
        return $this->hasMany(License::class);
    }
}
