<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        return [
            'role_title' => $this->faker->randomElement(['Manager', 'Inventory', 'Sales']),
            'monthly_salary' => $this->faker->randomFloat(2, 3000, 10000),
            'pay_rate' => $this->faker->randomFloat(2, 20, 50),
        ];
    }
}
