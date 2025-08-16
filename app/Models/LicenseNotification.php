<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class LicenseNotification extends Model
{
    use HasUuid;
    
    protected $fillable = [
        'license_id',  // pastikan ini juga ada kalau kamu simpan relasinya
        'message',
    ];
    
        public function license()
    {
        return $this->belongsTo(License::class);
    }

}
