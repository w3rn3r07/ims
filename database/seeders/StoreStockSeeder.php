<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StoreStock;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class StoreStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // StoreStock::factory()->count(10)->create();
        $storeStocks = StoreStock::factory()->count(100)->create();
        $books = Book::pluck('book_id')->toArray();

        //If no book_id is present it is exited
        if (empty($books)) {
            return;
        }

        foreach ($storeStocks as $storeStock) {
            // Attach 5-10 random books to each store stock with unique details
            $randomBookIds = array_rand(array_flip($books), rand(5, 10));
            $randomBookIds = is_array($randomBookIds) ? $randomBookIds : [$randomBookIds];

            foreach ($storeStocks as $storeStock) {
                // Attach 1-5 random books to each store stock
                $randomBookIds = array_rand(array_flip($books), rand(1, 5));
                $randomBookIds = is_array($randomBookIds) ? $randomBookIds : [$randomBookIds];

                $storeStock->books()->attach($randomBookIds);
            }
        }
    }
}
