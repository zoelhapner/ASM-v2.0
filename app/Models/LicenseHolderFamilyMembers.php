<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Carbon;

class LicenseHolderFamilyMembers extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'license_holder_id',
        'name',
        'relationship',
        'gender',
        'birth_date',
        'job',
        'job_phone',
        'last_education_level',
        'institution_name',
    ];

     public function getBirthDateFormattedAttribute()
    {
        return $this->birth_date ? Carbon::parse($this->birth_date)->format('d/m/Y') : '-';
    }

    public function getReadableRelationshipAttribute()
    {
    return [
        1 => 'Suami',
        2 => 'Istri',
        3 => 'Anak',
        4 => 'Orang Tua',
        5 => 'Famili Lain',
    ][$this->relationship] ?? 'Tidak diketahui';
    }

    public function getReadableGenderAttribute()
    {
    return [
        1 => 'Laki - Laki',
        2 => 'Perempuan',
    ][$this->gender] ?? 'Tidak diketahui';
    }
    
    public function license_holder()
{
    return $this->belongsTo(LicenseHolder::class);
}

}
