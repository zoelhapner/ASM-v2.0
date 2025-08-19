<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
    protected $description = 'Link the public/storage directory to Railway volume';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $target = '/mnt/data';
        $link = public_path('storage');

        if (file_exists($link)) {
            $this->laravel->make('files')->delete($link);
        }

        $this->laravel->make('files')->link($target, $link);

        $this->info("The [public/storage] directory has been linked to {$target}.");
    }
}
