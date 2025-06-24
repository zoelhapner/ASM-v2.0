<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    public function district() {
        return $this->belongsTo(District::class);
    }

    public function licenses() {
        return $this->hasMany(License::class);
    }
}
