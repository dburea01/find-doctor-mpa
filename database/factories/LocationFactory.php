<?php
namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'location ' . fake()->word,
            'address1' => fake()->streetName(),
            'city_id' => City::inRandomOrder()->first()->id,
            'comment' => fake()->paragraph(),
            'web_site' => fake()->url(),
        ];
    }
}
