<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LicenseNotification extends Model
{
    protected $fillable = [
        'license_id',  // pastikan ini juga ada kalau kamu simpan relasinya
        'message',
    ];
    
        public function license()
    {
        return $this->belongsTo(License::class);
    }

}
