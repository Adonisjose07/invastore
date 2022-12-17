<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Illuminate\Support\Str;

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
        $name = $this->faker->sentence(6, true);
        return [
            'category_id' => 1,
            'type' => 'PHYSIC',
            'name' => $name,
            'slug' => Str::slug($name),
            'active' => true,
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
