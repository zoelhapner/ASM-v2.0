<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LicenseHolder extends Model
{
    public function License()
{
    return $this->belongsTo(License::class);
}

    public function Religions()
{
    return $this->hasMany(Religion::class);
}

    public function LicenseHolderEducation()
{
    return $this->hasMany(LicenseHolderEducation::class);
}

     public function LicenseHolderWorkExperiences()
{
    return $this->hasMany(LicenseHolderWorkExperiences::class);
}

    public function LicenseHolderFamilyMembers()
{
    return $this->hasMany(LicenseHolderFamilyMembers::class);
}

}
