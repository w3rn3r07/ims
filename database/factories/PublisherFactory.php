<?php

namespace Database\Factories;

use App\Models\Publisher;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    protected $model = Publisher::class;

    public function definition(): array
    {
        return [
            'name' => substr($this->faker->company(), 0, 50),
            'phone_no' => $this->faker->numerify('##########'), //Used to create a fake phone number
            'email' => $this->faker->unique()->safeEmail(),
            'address' => substr($this->faker->address(), 0, 300),
            'author_id' => Author::factory(),
        ];
    }
}
