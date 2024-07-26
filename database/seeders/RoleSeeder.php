<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        Role::create([
            'role_id' => 1,
            'role_title' => 'Manager',
            'monthly_salary' => 5000,
            'pay_rate' => 40,
        ]);

        Role::create([
            'role_id' => 2,
            'role_title' => 'Inventory',
            'monthly_salary' => 4000,
            'pay_rate' => 35,
        ]);

        Role::create([
            'role_id' => 3,
            'role_title' => 'Sales',
            'monthly_salary' => 4500,
            'pay_rate' => 38,
        ]);
    }
}
