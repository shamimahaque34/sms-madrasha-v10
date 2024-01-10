<?php

namespace Database\Factories;

use App\Models\Backend\Academic\EducationalStage;
use Illuminate\Support\Str;
use App\Models\Backend\Academic\AcademicClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AcademicClass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_name' => $this->faker->text(191),
            'class_numeric' => $this->faker->unique->text(191),
            'note' => $this->faker->text,
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 127),
            'educational_stage_id' => EducationalStage::factory(),
        ];
    }
}
