<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'name' => substr($this->faker->company(), 0, 50),
            'phone_no' => $this->faker->numerify('##########'), //Used to create a fake phone number
            'email' => $this->faker->unique()->safeEmail(),
            'address' => substr($this->faker->address(), 0, 300),
        ];
    }
}
