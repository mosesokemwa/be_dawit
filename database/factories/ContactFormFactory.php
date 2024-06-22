<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactForm>
 */
class ContactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'message' => $this->faker->sentence(),
            'privacy_policy' => $this->faker->boolean(),
            'subscribe' => $this->faker->boolean(),
            'phone_number' => $this->faker->phoneNumber(),
            'company' => $this->faker->company(),
        ];
    }
}
