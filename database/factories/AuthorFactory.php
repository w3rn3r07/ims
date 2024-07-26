<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'fname' => $this->faker->firstName(50),
            'lname' => $this->faker->lastName(50),
            'email' => $this->faker->unique()->safeEmail(225),
        ];
    }
}
