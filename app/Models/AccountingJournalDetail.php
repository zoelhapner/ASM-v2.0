<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class AccountingJournalDetail extends Model
{
    use HasUuid;

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = 'accounting_journal_details';
    
    protected $fillable = [
        'journal_id',
        'account_id',
        'person',
        'debit',
        'credit',
        'description',
    ];

     public function journal()
    {
        return $this->belongsTo(AccountingJournal::class, 'journal_id');
    }

    public function account()
    {
        return $this->belongsTo(AccountingAccount::class, 'account_id');
    }

public function getPersonNameAttribute()
{
    $akunOtomatisPusat = ['K 0026', 'K 0027', 'K 0031', 'K 0032'];

    if (in_array($this->account->account_code ?? '', $akunOtomatisPusat)) {
        // $pusatUserId = '961d4be4-c284-455a-896c-08795e258f6d';
        return Str::isUuid($this->person)
            ? User::find($this->person)?->name ?? '-'
            : $this->person;
    }

    return match ($this->account->person_type) {

        'student' => Str::isUuid($this->person)
            ? Student::find($this->person)?->fullname
            : $this->person,

        'employee' => Str::isUuid($this->person)
            ? Employee::find($this->person)?->fullname
            : $this->person,

        'licenseholder' => Str::isUuid($this->person)
            ? LicenseHolder::find($this->person)?->fullname
            : $this->person,

        'license' => Str::isUuid($this->person)
            ? License::find($this->person)?->name
            : $this->person,

        default => $this->person ?? '-',
    };
}

}
