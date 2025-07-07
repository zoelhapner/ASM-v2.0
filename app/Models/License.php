<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class License extends Model
{
    public function province() {

    return $this->belongsTo(Province::class);
}

    public function city() {

    return $this->belongsTo(City::class);
}

    public function district() {

    return $this->belongsTo(District::class);
}

    public function subDistrict() {

    return $this->belongsTo(SubDistrict::class);
}

    public function postalCode()
{
    return $this->belongsTo(PostalCode::class, 'postal_code_id');
}

public function owners()
{
    return $this->belongsToMany(User::class, 'license_user', 'license_id', 'user_id');
}

public function employees()
{
    return $this->belongsToMany(Employee::class, 'employee_license', 'license_id', 'employee_id');
}



    // Di model License

    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'license_id',
        'license_type',
        'name',
        'email',
        'address',
        'province_id',
        'city_id',
        'district_id',
        'sub_district_id',
        'postal_code_id',
        'phone',
        'join_date',
        'expired_date',
        'contract_agreement_number',
        'status',
        'building_type',
        'building_status',
        'building_rent_expired_date',
        'building_area',
        'building_condition',
        'building_has_ac',
        'instagram',
        'facebook_page',
        'tiktok',
        'youtube',
        'google_maps',
        'landing_page_student_registration',
    ];

}
