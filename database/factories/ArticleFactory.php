<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return ['subject' => $this->faker->name(),
            'content' => $this->faker->sentence(),
            'cgy_id' => $this->faker->numberBetween(1, 10),
            'enabled' => $this->faker->randomElement([true, false]),
            'sort' => $this->faker->numberBetween(0, 20),
            'enabled_at' => Carbon::createFromFormat('Y-m-d', $this->faker->date)->now()->addDays(rand(1, 20)),
            'pic' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats')];
    }
}
