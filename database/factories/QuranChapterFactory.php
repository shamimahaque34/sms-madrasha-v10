<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Backend\Quran\QuranChapter;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuranChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuranChapter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'arabic_name' => $this->faker->name,
            'bangla_name' => $this->faker->text(191),
            'english_name' => $this->faker->text(191),
            'chapter_serial' => $this->faker->text(191),
            'total_verse' => $this->faker->text(191),
            'surah_origin[Makki / Madani]' => $this->faker->numberBetween(
                0,
                127
            ),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
