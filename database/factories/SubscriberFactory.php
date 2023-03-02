<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscriber>
 */
class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lastname' => $this->faker->lastName(),
            'middlename' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'createddatetime' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'deletedatetime' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
            'updateddatetime' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'deleted' => $this->faker->boolean(10),
        ];
    }
}
