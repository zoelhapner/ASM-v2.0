<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EmployeeEducation extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'employee_educations';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'education_level',
        'institution_name',
        'start_year',
        'end_year',
        'is_graduated',
    ];

    public function employee()
{
    return $this->belongsTo(Employee::class);
}

     public function getReadableIsGraduatedAttribute()
    {
    return [
        1 => 'Lulus',
        0 => 'Tidak',
    ][$this->is_graduated] ?? 'Tidak diketahui';
    }

}
