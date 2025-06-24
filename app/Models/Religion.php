<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    public function licenseHolders()
{
    return $this->hasMany(LicenseHolder::class, 'religion_id');
}

}
