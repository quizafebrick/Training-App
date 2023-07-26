<?php

namespace Database\Factories;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lastName = Str::upper($this->faker->lastName());
        $birthday = $this->faker->dateTimeBetween('1920-01-01', 'now')->format('m-d-Y');

        // * AUTO-INCREMENTING STUDENT NUMBER * //
        static $studentNumberCounter = 1;
        $studentNumber = '2023-' . str_pad($studentNumberCounter++, 5, '0', STR_PAD_LEFT);

        return [
            'student_no' => $studentNumber,
            'user_id' => 1,
            'firstname' => Str::upper($this->faker->firstName()),
            'middlename' => Str::upper($this->faker->lastName()),
            'lastname' => $lastName,
            'contact_no' => $this->faker->unique()->numerify('09#########'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'birthday' => $birthday,
            'email_address' => preg_replace('/@(example\.org|example\.net|example\.com)/', '@gmail.com', $this->faker->unique()->safeEmail()),
            'password' => Hash::make(Str::lower($lastName)),
            'address' => Str::upper($this->faker->address()),
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Student $student) {
            $birthday = Carbon::createFromFormat('m-d-Y', $student->birthday);
            $student->age = $birthday->age;
        });
    }
}
