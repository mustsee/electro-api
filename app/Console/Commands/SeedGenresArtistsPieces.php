<?php

namespace App\Console\Commands;

use App\Genre;
use App\ArtistGenre;
use App\Artist;
use App\Piece;
use Illuminate\Console\Command;

class SeedGenresArtistsPieces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seedGenresArtistsPieces';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed genres, artists and pieces table';

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
            'musique concrète' => [
                "pierre schaeffer" => [
                    "album" => ["Complete Works"],
                ],
                "pierre henry" => [
                    "album" => [
                        "L'Homme à la caméra",
                        "Fragments pour Artaud",
                        "Le Voyage"
                    ],

                ]
            ]
        ];

        foreach ($genres as $genre => $artists) {
            $newGenre = new Genre([
                'name' => $genre,
                'order' => 1,
            ]);
            $newGenre->save();
            foreach ($artists as $artist => $types) {
                $newArtist = new Artist([
                    'name' => $artist
                ]);
                $newArtist->save();
                $newArtistsGenres = new ArtistGenre([
                    'artist_id' => $newArtist->id,
                    'genre_id' => $newGenre->id
                ]);
                $newArtistsGenres->save();
                foreach ($types as $type =>$pieces) {
                    if ($type === 'album') {
                        foreach ($pieces as $piece) {
                            $newAlbum = new Piece([
                                'title' => $piece,
                                'artist_id' => $newArtist->id,
                                'genre_id' => $newGenre->id,
                                'type' => 'album'
                            ]);
                            $newAlbum->save();
                        }
                    } elseif ($type === 'song') {
                        foreach ($pieces as $piece) {
                            $newSong = new Piece([
                                'title' => $piece,
                                'artist_id' => $newArtist->id,
                                'genre_id' => $newGenre->id,
                                'type' => 'song'
                            ]);
                            $newSong->save();
                        }
                    }
                }
            }
        }

        $genresBis = [
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

        foreach ($genresBis as $key => $genreBis) {
            $newGenre = new Genre([
                'name' => $genreBis,
                'order' => 1,
            ]);
            $newGenre->save();
        }
    }
}