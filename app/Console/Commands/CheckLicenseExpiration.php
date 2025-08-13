<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\License;
use Carbon\Carbon;
use App\Models\LicenseNotification;
use Illuminate\Support\Facades\Log;

class CheckLicenseExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'license:check-expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for licenses expiring soon or already expired and update status with notifications';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now();
        $threshold = $today->copy()->addMonths(5);

        // === STEP 1: Notifikasi lisensi yang akan expired dalam 5 bulan ===
        $willExpireSoon = License::where('status', 'active')
            ->whereDate('expired_date', '>', $today)
            ->whereDate('expired_date', '<=', $threshold)
            ->get();

        $notified = 0;

        foreach ($willExpireSoon as $license) {
            // Cek apakah notifikasi serupa sudah ada
            $existing = LicenseNotification::where('license_id', $license->id)
                ->where('message', 'like', "%akan expired%")
                ->first();

            if (!$existing) {
                LicenseNotification::create([
                    'license_id' => $license->id,
                    'message' => sprintf(
                        "Lisensi %s (%s - %s) akan expired pada %s.",
                        $license->license_id,
                        $license->license_type,
                        $license->name,
                        optional($license->expired_date)->format('Y-m-d') ?? '-'
                    ),
                    'read' => false,
                ]);
                $notified++;
            }
        }

        // === STEP 2: Update status jika expired ===
        $expiredLicenses = License::where('status', 'active')
            ->whereDate('expired_date', '<', $today)
            ->get();

        $expiredCount = 0;

        foreach ($expiredLicenses as $license) {
            $license->update(['status' => 'inactive']);
            $expiredCount++;

            LicenseNotification::create([
                'license_id' => $license->id,
                'message' => sprintf(
                    "Lisensi %s (%s - %s) akan expired pada %s.",
                    $license->license_id,
                    $license->license_type,
                    $license->name,
                    $license->expired_date->format('Y-m-d') ?? '-'
                ),
                'read' => false,
            ]);
        }

        $this->info("✅ {$notified} license(s) will expire soon.");
        $this->info("❌ {$expiredCount} license(s) marked as inactive.");
    }
}
