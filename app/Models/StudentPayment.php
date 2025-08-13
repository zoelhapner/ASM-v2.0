<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\HasUuid;

class StudentPayment extends Model
{
    protected $fillable = [
        'bill_id', 'paid_at', 'amount', 'payment_method', 'note'
    ];

    use HasUuid;

    protected $keyType = 'string';
    public $incrementing = false;

    public function bill(): BelongsTo
    {
        return $this->belongsTo(StudentBill::class);
    }
}
