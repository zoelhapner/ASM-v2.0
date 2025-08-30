<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class AccountingJournalDetail extends Model
{
    use HasUuid;

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

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
    // Daftar kode akun otomatis pusat
    $akunOtomatisPusat = ['K 0026', 'K 0027', 'K 0031', 'K 0032'];

    // Kalau account_code masuk list akun otomatis pusat
    if (in_array($this->account->account_code ?? '', $akunOtomatisPusat)) {
        // $pusatUserId = '961d4be4-c284-455a-896c-08795e258f6d'; // ID user pusat
        return \App\Models\User::find($this->person)?->name ?? '-';
    }

    // Kalau ada data person di DB, langsung proses sesuai type
     return match ($this->account->person_type) {
        'student'       => \App\Models\Student::find($this->person)?->fullname ?? '-',
        'employee'      => \App\Models\Employee::find($this->person)?->fullname ?? '-',
        'licenseholder' => \App\Models\LicenseHolder::find($this->person)?->fullname ?? '-',
        'license'       => \App\Models\License::find($this->person)?->name ?? '-',
         default         => $this->person ?? '-', // ⬅️ fallback ke kolom langsung
    };
}

}
