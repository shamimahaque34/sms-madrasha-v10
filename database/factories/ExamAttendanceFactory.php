<?php

namespace Database\Factories;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Exam\Exam;
use App\Models\Backend\Exam\ExamSchedule;
use App\Models\Backend\UserManagement\Student;
use Illuminate\Support\Str;
use App\Models\Backend\Exam\ExamAttendance;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamAttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamAttendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'is_present' => $this->faker->numberBetween(
                0,
                127
            ),
            'exam_id' => Exam::factory(),
            'exam_schedule_id' => ExamSchedule::factory(),
            'student_id' => Student::factory(),
            'section_id' => Section::factory(),
            'academic_class_id' => AcademicClass::factory(),
        ];
    }
}
