<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstName = strtolower(fake()->firstName(fake()->randomElement(['male', 'female']))); // tolower for the email
        $lastName = strtolower(fake()->lastName()); // tolower for the email

        $status = ['CREATED', 'VALIDATED', 'SUSPENDED'];
        $civiities = ['MR', 'MISS', 'DR'];

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'role_id' => 'PRACTI',
            'local_id' => fake()->bothify('1000#######'),
            'civility_id' => fake()->randomElement($civiities),
            'email' => $firstName.'.'.$lastName.'@'.fake()->domainName(),
            'email_verified_at' => now(),
            'user_status_id' => fake()->randomElement($status),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_contracted' => fake()->boolean(),
        ];
    }
}
