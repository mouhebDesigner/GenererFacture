<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'user_id' => function () {
                // Vous pouvez utiliser la relation Many-to-One avec User ici pour générer un utilisateur associé.
                return \App\Models\User::where('role', 'client')->inRandomOrder()->first();
            },
        ];
    }
}
