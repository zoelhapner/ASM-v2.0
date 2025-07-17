<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory, HasUuid;

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'user_id',
        'fullname',
        'nickname',
        'gender',
        'birth_place',
        'birth_date',
        'marital_status',
        'religion_id',
        'identity_number',
        'address',
        'province_id',
        'city_id',
        'district_id',
        'sub_district_id',
        'postal_code_id',
        'phone',
        'position',
        'department',
        'unit',
        'employment_status',
        'start_date',
        'basic_salary',
        'allowance',
        'deduction',
        'bonus',
        'thr',
        'contract_letter_file',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Jika employee bisa punya banyak license:
    public function licenses()
    {
        return $this->belongsToMany(License::class, 'employee_license', 'employee_id', 'license_id');
    }

        public function province()
{
    return $this->belongsTo(Province::class);
}

       public function city()
{
    return $this->belongsTo(City::class);
}

       public function district()
{
    return $this->belongsTo(District::class);
}

       public function subDistrict()
{
    return $this->belongsTo(SubDistrict::class);
}

    public function postalCode()
{
    return $this->belongsTo(PostalCode::class, 'postal_code_id');
}

    public function religion()
{
    return $this->belongsTo(Religion::class, 'religion_id');
}

    public function educations()
{
    return $this->hasMany(EmployeeEducation::class);
}

     public function workers()
{
    return $this->hasMany(EmployeeWorkExperience::class);
}

    public function families()
{
    return $this->hasMany(EmployeeFamilyMember::class);
}

     public function getMarriedDateFormattedAttribute()
    {
        return $this->married_date ? Carbon::parse($this->married_date)->format('d/m/Y') : '-';
    }

    public function getBirthDateFormattedAttribute()
    {
        return $this->birth_date ? Carbon::parse($this->birth_date)->format('d/m/Y') : '-';
    }

    public function getReadableMaritalStatusAttribute()
    {
    return [
        1 => 'Lajang',
        2 => 'Menikah',
        3 => 'Duda',
        4 => 'Janda',
    ][$this->marital_status] ?? 'Tidak diketahui';
    }

    public function getFullnameAttribute($value)
{
    return Str::title($value);
}

}
