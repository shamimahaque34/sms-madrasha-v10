<?php

namespace Database\Factories;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\AcademicYear;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Academic\Subject;
use App\Models\Backend\Exam\Exam;
use Illuminate\Support\Str;
use App\Models\Backend\Exam\ExamSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExamSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_date' => $this->faker->date,
            'start_time' => $this->faker->text(255),
            'end_time' => $this->faker->text(255),
            'room' => $this->faker->text(255),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'exam_id' => Exam::factory(),
            'section_id' => Section::factory(),
            'subject_id' => Subject::factory(),
            'academic_year_id' => AcademicYear::factory(),
            'academic_class_id' => AcademicClass::factory(),
        ];
    }
}
