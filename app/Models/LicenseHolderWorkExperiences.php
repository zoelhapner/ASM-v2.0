<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Carbon;

class LicenseHolderWorkExperiences extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'license_holders_work_experiences';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'license_holder_id',
        'company_name',
        'city',
        'phone',
        'position',
        'employment_type',
        'start_date',
        'end_date',
        'is_current',
        'skills_used',
        'job_description',
    ];

    public function getStartDateFormattedAttribute()
    {
        return $this->start_date ? Carbon::parse($this->start_date)->format('d/m/Y') : '-';
    }

    public function getEndDateFormattedAttribute()
    {
        return $this->end_date ? Carbon::parse($this->end_date)->format('d/m/Y') : '-';
    }

    public function getReadableEmploymentTypeAttribute()
    {
    return [
        1 => 'Penuh Waktu',
        2 => 'Sampingan',
        3 => 'Magang',
        4 => 'Pekerja Lepas',
    ][$this->employment_type] ?? 'Tidak diketahui';
    }

    public function getReadableIsCurrentAttribute()
    {
    return [
        1 => 'Masih Bekerja',
        0 => 'Sudah Keluar',
    ][$this->is_current] ?? 'Tidak diketahui';
    }

    public function license_holder()
{
    return $this->belongsTo(LicenseHolder::class);
}
}
