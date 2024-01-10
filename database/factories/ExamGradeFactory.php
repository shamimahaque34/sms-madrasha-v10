<?php

namespace Database\Factories;

use App\Models\Backend\Exam\ExamGrade;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamGradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamGrade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grade_name' => $this->faker->text(191),
            'point' => $this->faker->text(191),
            'mark_form' => $this->faker->numberBetween(0, 8388607),
            'mark_to' => $this->faker->numberBetween(0, 8388607),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
