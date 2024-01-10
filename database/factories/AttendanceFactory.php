<?php

namespace Database\Factories;

use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\AcademicYear;
use App\Models\Backend\Academic\Attendance;
use App\Models\Backend\UserManagement\AcademicStuff;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_id' => $this->faker->randomNumber,
            'month' => $this->faker->monthName,
            'date' => $this->faker->date,
            'academic_year_id' => AcademicYear::factory(),
            'academic_class_id' => AcademicClass::factory(),
            'attendanceable_type' => $this->faker->randomElement([
                Student::class,
                Teacher::class,
                AcademicStuff::class,
            ]),
            'attendanceable_id' => function (array $item) {
                return app($item['attendanceable_type'])->factory();
            },
        ];
    }
}
