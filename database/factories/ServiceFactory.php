<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $allowedTypes = ['autoszerelo', 'automoso', 'alkatreszkereskedo', 'automentok', 'gumiszerviz'];

        return [
            'slug' => $this->faker->unique()->slug(),
            'name' => $this->faker->company(),
            'desc' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement($allowedTypes),
            'address' => $this->faker->address(),
        ];
    }
}
