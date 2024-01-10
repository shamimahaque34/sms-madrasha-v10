<?php

namespace Database\Factories;

use App\Models\Backend\Quran\QuranFont;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuranFontFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuranFont::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quran_font' => $this->faker->text(191),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
