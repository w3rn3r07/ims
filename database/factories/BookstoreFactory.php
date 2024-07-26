<?php

namespace Database\Factories;

use App\Models\Bookstore;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookstore>
 */
class BookstoreFactory extends Factory
{
    protected $model = Bookstore::class;

    public function definition(): array
    {
        return [
            'name' => substr($this->faker->unique()->company(), 0, 50),
            'phone_no' => $this->faker->numerify('##########'), //Used to create a fake phone number
            'email' => $this->faker->unique()->safeEmail(),
            'city' => substr($this->faker->city(), 0, 90),
            'street_name' => substr($this->faker->streetName(), 0, 50),
            'postcode' => $this->faker->regexify('[A-Z]{2}[0-9]{2}-[0-9]{1}[A-Z]{2}'), // Random alphanumeric postcode 
        ];
    }
}
