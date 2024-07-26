<?php

namespace Database\Factories;

use App\Models\StoreStock;
use App\Models\Bookstore;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreStock>
 */
class StoreStockFactory extends Factory
{
    protected $model = StoreStock::class;

    public function definition(): array
    {
        $bookstoreId = Bookstore::inRandomOrder()->value('bookstore_id');

        if (!$bookstoreId) {
            throw new \Exception('No Bookstore records found');
        }
        return [
            'SKU' => $this->faker->unique()->ean13,
            'current_stock' => $this->faker->numberBetween(0, 100),
            'min_stock' => $this->faker->numberBetween(0, 10),
            'max_stock' => $this->faker->numberBetween(10, 200),
            'status' => $this->faker->randomElement(['In Stock', 'Out of Stock']),
            'bookstore_id' => $bookstoreId,
        ];
    }
}
