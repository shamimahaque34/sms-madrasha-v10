<?php

namespace Database\Factories;

use App\Models\Backend\Exam\ExamMarkDistributionType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamMarkDistributionTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamMarkDistributionType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'distribution_type' => $this->faker->text(191),
            'mark_value' => $this->faker->numberBetween(0, 100),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 4),
        ];
    }
}
