<?php

namespace Database\Factories;

use App\Models\Backend\Quran\QuranChapter;
use App\Models\Backend\Quran\QuranFont;
use App\Models\Backend\Quran\QuranVerse;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuranVerseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuranVerse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'verse_arabic' => $this->faker->text,
            'verse_bangla' => $this->faker->text,
            'verse_english' => $this->faker->text,
            'audio' => $this->faker->text(191),
            'slug' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 127),
            'quran_chapter_id' => QuranChapter::factory(),
            'quran_font_id' => QuranFont::factory(),
        ];
    }
}
