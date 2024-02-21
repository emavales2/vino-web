<?php

// une commande artisan personnalisée dans Laravel, utilisée pour générer des fichiers JSON de traduction à partir des fichiers de langue Laravel existants. 

// ------->  php artisan translation:generate-json  <-------

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateJsonTranslationFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translation:generate-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This commands go through en lang files and creates en.json file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Accessing the storage disk named 'languages'
        $storage = Storage::disk('languages');
        // Getting the list of directories inside the 'languages' disk
        $directories = $storage->directories();
        foreach ($directories as $directory) {
            $files = $storage->allFiles($directory);
            $array = [];
            foreach ($files as $file) {
                //do not include "api" directory, because api is only for API calls
                if (str_starts_with($file, $directory.'/api')) {
                    continue;
                }
                $baseName = str_replace('.php', '', basename($file));
                $contents = require $storage->path($file);
                $array[$baseName] = $contents;
            }
            // Define the file path for the JSON file
            $filePath = sprintf('%s.json', $directory);
            // Write the array as JSON to the file
            $storage->put($filePath, json_encode($array, JSON_PRETTY_PRINT));
        }
        // Display a message indicating that the files have been generated
        $this->info('Files generated');

        return 0;
    }
}