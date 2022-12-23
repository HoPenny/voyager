<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CgyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return ['subject' => $this->faker->sentence, 'enabled' => $this->faker->randomElement([true, false]), 'enabled_at' => Carbon::createFromFormat('Y-m-d', $this->faker->date)->now()->addDays(rand(1, 20)), 'sort' => $this->faker->randomElement([0, 1, 2, 3, 4, 5])];
    }
}