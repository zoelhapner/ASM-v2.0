<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public function Province() {

    return $this->belongsTo(Province::class);
}

    public function City() {

    return $this->belongsTo(City::class);
}

    public function District() {

    return $this->belongsTo(District::class);
}

    public function LicenseHolder()
{
    return $this->hasMany(LicenseHolder::class);
}

}
