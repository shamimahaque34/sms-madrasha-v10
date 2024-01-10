<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Backend\Academic\ClassSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'starting_time' => $this->faker->text(191),
            'starting_time_timestamp' => $this->faker->dateTime,
            'ending_time' => $this->faker->text(191),
            'ending_time_timestamp' => $this->faker->dateTime,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
