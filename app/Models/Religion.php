<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class religion extends Model
{
    public function LicenseHolder()
{
    return $this->belongsTo(LicenseHolder::class);
}

}
