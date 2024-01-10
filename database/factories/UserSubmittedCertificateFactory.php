<?php

namespace Database\Factories;

use App\Models\Backend\UserManagement\Teacher;
use Illuminate\Support\Str;
use App\Models\Backend\UserManagement\UserSubmittedCertificate;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSubmittedCertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserSubmittedCertificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_type' => $this->faker->text(191),
            'user_submitted_certificateable_type' => $this->faker->randomElement(
                [Teacher::class, /*\App\Models\AcademicStuff::class*/]
            ),
            'user_submitted_certificateable_id' => function (array $item) {
                return app(
                    $item['user_submitted_certificateable_type']
                )->factory();
            },
        ];
    }
}
