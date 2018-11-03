<?php

namespace App\Console\Commands;

use App\Genre;
use Illuminate\Console\Command;

class SeedGenres extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seedGenres';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed genres table with music genre';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $genres = [
          'musique concrète',
          'krautrock',
          'disco',
          'post-punk',
          'house',
          'hip-hop',
          'techno',
          'jungle',
          'ambient',
          'downtempo'
        ];

        foreach ($genres as $key => $genre) {
            $newGenre = new Genre([
                'order' => $key + 1,
                'name' => $genre
            ]);
            $newGenre->save();
        }
    }
}