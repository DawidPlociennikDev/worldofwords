<?php

namespace Tests\Feature;

use App\Models\Word;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WordControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_database_has_apple_word_and_translate_word()
    {
        $word = Word::create([
            'english_word' => 'apple',
            'translation' => 'jabłko',
        ]);

        $this->assertDatabaseHas('words', ['english_word' => $word->english_word, 'translation' => $word->translation]);
    }

    public function test_random_words_with_translation()
    {
        $word = Word::create([
            'english_word' => 'apple',
            'translation' => 'jabłko',
        ]);

        $response = $this->get(route('words'));

        $response->assertStatus(200);
        $response->assertSee($word->english_word);
        $response->assertSee($word->translation);
    }

    public function test_random_words_without_translation()
    {
        $word = Word::create([
            'english_word' => 'apple',
            'translation' => null,
        ]);

        $response = $this->get(route('words'));

        $response->assertStatus(200);
        $response->assertSee($word->english_word);
    }

    public function test_create_translate_word_post()
    {

        $englishWord = 'apple';
        $polishWord = 'jabłko';

        $this->assertDatabaseMissing('words', ['english_word' => $englishWord, 'translation' => $polishWord]);

        Word::create([
            'english_word' => $englishWord,
            'translation' => null,
        ]);

        $this->post(route('translations'), ['translations' => [0 => $polishWord]])
            ->assertOk()
            ->assertJsonStructure(['message'])
            ->assertStatus(200);

        $this->assertDatabaseHas('words', ['english_word' => $englishWord, 'translation' => $polishWord]);
    }

    public function test_database_seed_with_faker_words()
    {
        $this->artisan('migrate:refresh --seed')->assertExitCode(0);
    }

    public function test_database_has_ten_words()
    {
        $this->assertCount(10, Word::where('translation', null)->get(), 'Database has 10 untranslated words');
    }

}
