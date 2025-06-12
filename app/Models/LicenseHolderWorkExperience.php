<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LicenseHolderWorkExperience extends Model
{
    //
    public function LicenseHolder()
{
    return $this->belongsTo(LicenseHolder::class);
}
}
