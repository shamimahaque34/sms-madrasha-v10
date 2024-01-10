<?php

namespace Database\Factories;

use App\Models\Backend\Designation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Designation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'title_bangla' => $this->faker->text(191),
            'position_number' => $this->faker->numberBetween(0, 8388607),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
