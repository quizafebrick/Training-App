<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'firstname' => Str::upper(fake()->firstName()),
            'middlename' => Str::upper(fake()->lastName()),
            'lastname' => Str::upper(fake()->lastName()),
            'contact_no' => fake()->unique()->numerify('+63###########'),
            'gender' => fake()->randomElement(['MALE', 'FEMALE']),
            'birthday' => fake()->dateTimeBetween('1920-01-01', 'now')->format('d/m/Y'),
            'age' => fake()->numerify('##'),
            'email_address' => fake()->unique()->safeEmail(),
            'address' => Str::upper(fake()->address())
        ];
    }
}
