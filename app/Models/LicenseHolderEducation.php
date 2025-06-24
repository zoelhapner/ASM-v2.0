<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class LicenseHolderEducation extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'license_holder_educations';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'license_holder_id',
        'education_level',
        'institution_name',
        'major',
        'start_year',
        'end_year',
        'is_graduated',
    ];

    public function license_holder()
{
    return $this->belongsTo(LicenseHolder::class);
}

}
