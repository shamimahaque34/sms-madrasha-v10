<?php

namespace Database\Factories;


use App\Models\Backend\UserManagement\Teacher;
use App\Models\Backend\Designation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->unique->text(191),
            'name_english' => $this->faker->name,
            'name_bangla' => $this->faker->text(191),
            'email' => $this->faker->unique->email,
            'phone' => $this->faker->phoneNumber,
            'dob' => $this->faker->text(191),
            'dob_timestamp' => $this->faker->dateTime,
            'mpo_index_number' => $this->faker->text(191),
            'bank_account_no' => $this->faker->text(191),
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'religion' => $this->faker->text(191),
            'jod' => $this->faker->text(191),
            'jod_timestamp' => $this->faker->dateTime,
            'address' => $this->faker->text,
            'subject' => $this->faker->text(191),
            'highest_education' => $this->faker->text(191),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'payment_grade' => $this->faker->text(191),
            'user_id' => \App\Models\User::factory(),
            'created_by' => \App\Models\User::factory(),
            'designation_id' => Designation::factory(),
        ];
    }
}
