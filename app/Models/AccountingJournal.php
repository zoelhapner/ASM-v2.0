<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class AccountingJournal extends Model
{
    use HasUuid;

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

     protected $fillable = [
        'license_id',
        'journal_code',
        'transaction_date',
        'description',
        'enclosure',
        'created_by',
    ];

    public function license()
    {
        return $this->belongsTo(License::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function details()
    {
        return $this->hasMany(AccountingJournalDetail::class, 'journal_id');
    }
}
