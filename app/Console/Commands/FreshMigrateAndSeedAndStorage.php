<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FreshMigrateAndSeedAndStorage extends Command
{
    protected $signature = 'custom:migrate-fresh-seed-storage-public';

    protected $description = 'Drop all tables, migrate fresh, seed database, and remove public images';

    public function handle()
    {
        // * REMOVE PUBLIC IMAGES * //
        $this->removePublicImages();

        // * DROP ALL TABLES AND RE-RUN MIGRATIONS * //
        $this->call('migrate:fresh', ['--seed' => true]);

        // * REFRESH THE STORAGE LINK * //
        $this->call('storage:link');

        $this->info('Database migrated, seeded, and public images removed successfully!');
    }

    private function removePublicImages()
    {
        $publicImagePath = public_path('images');

        // * CHECK IF THE IMAGES DIRECTORY EXISTS IN THE PUBLIC PATH * //
        if (File::exists($publicImagePath)) {
            // * DELETE ALL FILES IN THE IMAGES DIRECTORY * //
            File::cleanDirectory($publicImagePath);
        }
    }
}
