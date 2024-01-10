<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Backend\Academic\EducationalStage;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationalStageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EducationalStage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_name' => $this->faker->text(191),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
