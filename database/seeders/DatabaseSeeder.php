<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //users for login
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AuthorSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(BookstoreSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(StoreStockSeeder::class);
        $this->call(SupplierSeeder::class);
    }
}
