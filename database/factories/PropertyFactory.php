<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->streetName,
            'description' => $this->faker->paragraph,
            'location_id' => 1,
            'properties_type_id' => 1,
            'agent_id' => 1,
            'visits' => 0,
        ];
    }
}
