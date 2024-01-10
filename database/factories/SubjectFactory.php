<?php

namespace Database\Factories;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\EducationalStage;
use App\Models\Backend\Academic\StudentGroup;
use App\Models\Backend\Academic\Subject;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Subject_name' => $this->faker->text(191),
            'subject_type' => $this->faker->text(191),
            'pass_mark' => $this->faker->randomNumber(0),
            'final_mark' => $this->faker->randomNumber(0),
            'point' => $this->faker->numberBetween(0, 32767),
            'Subject_author' => $this->faker->text(191),
            'Subject_code' => $this->faker->text(191),
            'Subject_book_image' => $this->faker->text,
            'Is_for_graduation' => $this->faker->numberBetween(0, 127),
            'is_main_subject' => $this->faker->numberBetween(0, 127),
            'Is_optional' => $this->faker->numberBetween(0, 127),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'updated_by' => \App\Models\User::factory(),
            'educational_stage_id' => EducationalStage::factory(),
            'student_group_id' => StudentGroup::factory(),
            'academic_class_id' => AcademicClass::factory(),
        ];
    }
}
