<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class AccountingAccount extends Model
{
    use HasUuid;

    protected $table = 'accounting_accounts';
    protected $casts = [
        'account_type' => 'string',
        'balance_type' => 'string',
        'is_active' => 'boolean',
        'is_parent' => 'boolean',
        'initial_balance' => 'decimal:2',
        'person_type' => 'string',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    
    protected $fillable = [
       'license_id',
        'account_code',
        'account_name',
        'account_type',
        'is_parent',
        'parent_id',
        'balance_type',
        'initial_balance',
        'is_active',
        'person_type',
    ];

          public function license()
    {
        return $this->belongsTo(License::class, 'license_id', 'id');
    }

      public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
