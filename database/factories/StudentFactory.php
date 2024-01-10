<?php

namespace Database\Factories;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Academic\StudentGroup;
use App\Models\Backend\Academic\Subject;
use App\Models\Backend\UserManagement\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_english' => $this->faker->name,
            'name_bangla' => $this->faker->text(191),
            'username' => $this->faker->text(191),
            'email' => $this->faker->unique->email,
            'phone' => $this->faker->phoneNumber,
            'dob' => $this->faker->text(191),
            'dob_timestamp' => $this->faker->text(191),
            'gender' => array_rand(array_flip(['male', 'female', 'other']), 1),
            'blood_group' => $this->faker->text(191),
            'registration_no' => $this->faker->text(191),
            'roll_no' => $this->faker->text(191),
            'religion' => $this->faker->text(191),
            'address' => $this->faker->text,
            'division' => $this->faker->text(191),
            'district' => $this->faker->text(191),
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'extra_activities' => $this->faker->text,
            'remarks' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'user_id' => \App\Models\User::factory(),
            'parent_id' => \App\Models\Parent::factory(),
            'section_id' => Section::factory(),
            'student_group_id' => StudentGroup::factory(),
            'main_subject_id' => Subject::factory(),
            'optional_subject_id' => Subject::factory(),
            'academic_class_id' => AcademicClass::factory(),
        ];
    }
}
