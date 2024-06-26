<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product; // Replace with your product model path if different
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();

        return [
            'product_name' => $this->faker->unique()->sentence(2), // Unique product name
            'artist' => $faker->name,
            'genre' => $faker->randomElement(['Rock', 'Pop', 'Hip Hop', 'Country']), // Example genres
            'release_date' => $faker->dateTimeBetween('-2 years', 'now'), // Release date between 2 years ago and now
            'price' => $faker->numberBetween(650, 1000),
            'stock' => $faker->numberBetween(100, 500),
            'supplier_id' =>  $faker->numberBetween(1, 2),
        ];
    }
}
