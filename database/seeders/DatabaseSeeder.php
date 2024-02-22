<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Movie;
use illuminate\Support\Facades\Hash;
use illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
    }
}
