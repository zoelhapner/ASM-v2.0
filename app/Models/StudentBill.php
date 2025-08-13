<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\HasUuid;

class StudentBill extends Model
{
     protected $fillable = [
        'student_id', 'type', 'description', 'amount', 'due_date', 'status'
    ];

    use HasUuid;

    protected $keyType = 'string';
    public $incrementing = false;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(StudentPayment::class, 'bill_id');
    }
}
