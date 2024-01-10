<?php

namespace Database\Factories;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\AcademicYear;
use App\Models\Backend\Academic\ClassSchedule;
use App\Models\Backend\Academic\Routine;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Academic\Subject;
use App\Models\Backend\UserManagement\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoutineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Routine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => $this->faker->text(255),
            'room' => $this->faker->text(255),
            'note' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 127),
            'teacher_id' => Teacher::factory(),
            'section_id' => Section::factory(),
            'subject_id' => Subject::factory(),
            'class_schedule_id' => ClassSchedule::factory(),
            'academic_year_id' => AcademicYear::factory(),
            'academic_class_id' => AcademicClass::factory(),
        ];
    }
}
