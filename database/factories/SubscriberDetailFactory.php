<?php

namespace Database\Factories;

use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubscriberDetail>
 */
class SubscriberDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'headerid' => function () {
                return Subscriber::factory()->create()->id;
            },
            'phoneno' => $this->faker->phoneNumber(),
            'provider' => $this->faker->randomElement(['SMART', 'TM', 'GLOBE']),
            'deleted' => $this->faker->boolean(10),
        ];
    }
}
