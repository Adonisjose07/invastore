<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => 1,
            'type' => 'PHYSIC',
            'name' => $this->faker->sentence(6, true),
            'price' => $this->faker->randomFloat(1, 0, 999),
            'description' => $this->faker->text(250),
        ];
    }

    public function setCategory($id){
        return [
            'category_id' => $id
        ];
    }
}
