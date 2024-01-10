<?php

namespace Database\Factories;

use App\Models\Backend\Quran\QuranChapter;
use App\Models\Backend\Quran\QuranTranslationProvider;
use App\Models\Backend\Quran\QuranVerse;
use Illuminate\Support\Str;
use App\Models\Backend\Quran\QuranTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuranTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuranTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'translated_verse' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'quran_chapter_id' => QuranChapter::factory(),
            'quran_verse_id' => QuranVerse::factory(),
            'quran_translation_provider_id' => QuranTranslationProvider::factory(),
        ];
    }
}
