<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\Bookstore;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    protected $model = Staff::class;

    public function definition(): array
    {
        return [
            'fname' => substr($this->faker->firstName(), 0, 50),
            'lname' => substr($this->faker->lastName(), 0, 50),
            'username' => substr($this->faker->unique()->userName(), 0, 30),
            'password' => Hash::make($this->faker->password(8, 30)), // Generates a random password between 8 to 30 character
            // 'password' => bcrypt('password(30)'), // simple passwords for testing
            'phone_no' => $this->faker->numerify('##########'), //Used to create a fake phone number
            'emergency_no' => $this->faker->numerify('##########'), //Used to create a fake phone number
            'email' => $this->faker->unique()->safeEmail(),
            'city' => substr($this->faker->city(), 0, 90),
            'street_name' => substr($this->faker->streetName(), 0, 50),
            'postcode' => $this->faker->regexify('[A-Z]{2}[0-9]{2}-[0-9]{1}[A-Z]{2}'), // Random alphanumeric postcode 
            'sick_days' => $this->faker->numberBetween(0, 10),
            'accidents_report' => $this->faker->paragraph,
            'bookstore_id' => Bookstore::factory(),
            'role_id' => Role::factory(),
        ];
    }
}
