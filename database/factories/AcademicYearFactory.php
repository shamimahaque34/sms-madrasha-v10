<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Backend\Academic\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicYearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AcademicYear::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'session_year_start' => $this->faker->text(191),
            'session_year_end' => $this->faker->text(191),
            'session_month_start' => $this->faker->text(191),
            'session_month_end' => $this->faker->text(191),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
