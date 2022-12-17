<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credentials>
 */
class CredentialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName,
            'password' => '$2y$10$St2/CwquPg3nergOLWNHfu4C/uXQbmePr0qRtxB9P0oVof3YfZLRK',
            'type' => 'user',

        ];
    }
}
