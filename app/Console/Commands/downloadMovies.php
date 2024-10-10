<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;

class downloadMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to download all movies from themoviedb\'s api to update them or insert them into the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Start of movie downloads and updates');

        // Display a success message
        $this->info('Downloading and updating of the movies have been successfully completed');

    }
}
