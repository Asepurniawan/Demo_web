<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $media = Media::create([
            'title' => 'Ngeri-Ngeri Sedap',
            'genre' => 'Drama',
            'release_year' => 2022,
            'duration_minutes' => 114,
        ]);

        $media->users()->attach($user);
    }
}
