<?php

return [
    // Daftar kode akun yang disembunyikan untuk role tertentu
    'hidden_accounts' => [
        'Super-Admin'     => ['AKTIVA', 'KEWAJIBAN', 'EKUITAS', 'PENDAPATAN', 'BEBAN'],
        'Pemilik Lisensi' => ['AKTIVA', 'KEWAJIBAN', 'EKUITAS', 'PENDAPATAN', 'BEBAN'],
        'Akuntan'         => ['AKTIVA', 'KEWAJIBAN', 'EKUITAS', 'PENDAPATAN', 'BEBAN'],
    ],
];
