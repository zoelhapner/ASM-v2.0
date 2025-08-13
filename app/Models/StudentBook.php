<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentBook extends Model
{
     protected $fillable = [
        'student_id', 'title', 'author', 'price', 'purchased_at'
    ];

    Use HasUuid;

    protected $keyType = 'string';
    public $incrementing = false;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
