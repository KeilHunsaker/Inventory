<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->slug(),
        ];
    }

    public function setName(string $name)
    {
        return $this->state(fn(array $attributes) => [
            'name' => $name,
        ]);
    }
}
