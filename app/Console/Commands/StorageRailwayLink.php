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
        $link = public_path('storage');
        $target = '/mnt/data';

        // Hapus kalau sudah ada link/folder sebelumnya
        if (File::exists($link)) {
            File::delete($link);
        }

        // Buat symlink baru
        symlink($target, $link);

        $this->info("The [public/storage] directory has been linked to [$target].");
    }
}
