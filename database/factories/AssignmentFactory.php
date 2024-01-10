<?php

namespace Database\Factories;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\Assignment;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Academic\Subject;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'deadline' => $this->faker->text(191),
            'deadline_timestamp' => $this->faker->dateTime,
            'file_type' => $this->faker->text(191),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'subject_id' => Subject::factory(),
            'section_id' => Section::factory(),
            'academic_class_id' => AcademicClass::factory(),
        ];
    }
}
