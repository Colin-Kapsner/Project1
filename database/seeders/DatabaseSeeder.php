<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Movie;
use App\Models\Genre;
use illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // populate genres
        $genres = ['Action', 'Horror', 'Drama', 'Sci-Fi', 'Comedy', 'Romance', 'Fantasy', 'Western', 'Thriller', 'Musical', 'Documentary', 'Crime', 'Sports'];

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'genre' => $genre
            ]);
        }

        User::factory(30)
            ->has(Movie::factory()->count(10))
            ->create();


        User::factory()
            ->has(Movie::factory()->count(10))
            ->create([
                'first_name' => 'Colin',
                'last_name' => 'Kapsner',
                'email' => 'colinkapsner@yahoo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);


        // match up movies and genres
        // Get all the roles attaching up to 3 random genres to each movie
        $genres = Genre::all();
        // Populate the junction table
        Movie::all()->each(function ($movie) use ($genres) {
            $movie->genres()->attach(
                    $genres->random(rand(1, 3))->pluck('id')->toArray()
                );
        });
    }
}
