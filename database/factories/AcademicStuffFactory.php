<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Backend\UserManagement\AcademicStuff;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicStuffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AcademicStuff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->unique->text(255),
            'name_english' => $this->faker->name,
            'name_bangla' => $this->faker->text(255),
            'email' => $this->faker->unique->email,
            'phone' => $this->faker->phoneNumber,
            'dob' => $this->faker->text(255),
            'dob_timestamp' => $this->faker->text(255),
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'religion' => $this->faker->text(255),
            'jod' => $this->faker->text(255),
            'jod_timestamp' => $this->faker->dateTime,
            'address' => $this->faker->text,
            'highest_education' => $this->faker->text(255),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'user_id' => \App\Models\User::factory(),
            'created_by' => \App\Models\User::factory(),
            'designation_id' => \App\Models\Designation::factory(),
        ];
    }
}
