<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Backend\Quran\QuranTranslationProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuranTranslationProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuranTranslationProvider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_name' => $this->faker->text(191),
            'translated_by' => $this->faker->text(191),
            'language[bangla,english,arabic]' => $this->faker->text(191),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
