<?php

namespace Database\Factories;


use App\Models\Orders;
use App\Models\Supplier;
use App\Models\StoreStock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    protected $model = Orders::class;

    public function definition(): array
    {
        return [
            'purchase_date' => $this->faker->dateTimeThisYear(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'ETA' => $this->faker->dateTimeBetween('now', '+1 month'),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['Pending', 'Completed']),
            'supplier_id' => Supplier::factory(),
            'storestock_id' => StoreStock::factory(),
        ];
    }
}
