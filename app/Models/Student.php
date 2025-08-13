<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Carbon;

class Student extends Model
{
    public function license()
{
    return $this->belongsTo(License::class);
}

    public function user()
{
    return $this->belongsTo(User::class);
}


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

    public function religion()
{
    return $this->belongsTo(Religion::class, 'religion_id');
}

    public function bills()
{
    return $this->hasMany(StudentBill::class);
}

    public function books()
{
    return $this->hasMany(StudentBook::class);
}

 public function getBirthDateFormattedAttribute()
    {
        return $this->birth_date ? Carbon::parse($this->birth_date)->format('d/m/Y') : '-';
    }

    public function getRegisteredDateFormattedAttribute()
    {
        return $this->registered_date ? Carbon::parse($this->registered_date)->format('d/m/Y') : '-';
    }

     public function getReadableGenderAttribute()
    {
    return [
        1 => 'Laki - Laki',
        2 => 'Perempuan',
    ][$this->gender] ?? 'Tidak diketahui';
    }

       public function getReadableWhereKnowAttribute()
    {
    return [
        1 => 'Teman/Keluarga',
        2 => 'Website AHA',
        3 => 'Instagram',
        4 => 'Tiktok',
        5 => 'Facebook',
        6 => 'Youtube',
        7 => 'Whatsapp',
        8 => 'Banner',
        9 => 'Kantor AHA',
    ][$this->where_know] ?? 'Tidak diketahui';
    }



    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'license_id',
        'nis',
        'user_id',
        'fullname',
        'nickname',
        'gender',
        'birth_place',
        'birth_date',
        'age',
        'religion_id',
        'email',
        'address',
        'province_id',
        'city_id',
        'district_id',
        'sub_district_id',
        'postal_code_id',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'student_phone',
        'previous_school',
        'grade',
        'status',
        'photo',
        'registered_date',
        'where_know',
    ];

}
