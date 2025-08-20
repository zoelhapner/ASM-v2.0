<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File; 

class StorageRailwayLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:storage-railway-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from public/storage to /mnt/data for Railway deployment';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $storagePath = '/mnt/data/public';
        $publicPath = public_path('storage');

        // Buat folder /mnt/data/public kalau belum ada
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
            $this->info("Created directory: {$storagePath}");
        }

        // Hapus symlink lama kalau ada
        if (is_link($publicPath) || File::exists($publicPath)) {
            File::delete($publicPath);
            $this->info("Removed old storage link: {$publicPath}");
        }

        // Bikin symlink baru
        symlink($storagePath, $publicPath);
        $this->info("Linked {$publicPath} => {$storagePath}");
    }
}
