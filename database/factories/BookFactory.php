<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => substr($this->faker->catchPhrase(), 0, 50),
            'genre' => substr($this->faker->word(), 0, 30),
            'language' => $this->faker->languageCode(),
            'description' => $this->faker->paragraph(),
            'isbn' => $this->faker->isbn13(),
            'year' => $this->faker->year(),
            'edition' => substr($this->faker->word(), 0, 15),
            'no_of_pages' => $this->faker->numberBetween(100, 500),
            'cover_type' => substr($this->faker->word(), 0, 30),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'publisher_id' => Publisher::factory(),
        ];
    }
}
