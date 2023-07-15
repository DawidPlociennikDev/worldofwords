<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Word;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {    

        $data = file_get_contents(database_path('words.json'));
        $words = collect(json_decode($data), TRUE);

        $words->map(function ($polishWord, $englishWord) {
            Word::create(['english_word' => $englishWord, 'translation' => null]);
        });

        $this->call([
            WordSeeder::class
        ]);
    }
}
