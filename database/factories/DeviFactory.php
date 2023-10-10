<?php

namespace Database\Factories;

use App\Models\Devi;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class DeviFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                // Vous pouvez utiliser la relation Many-to-One avec User ici pour générer un utilisateur associé.
                return \App\Models\User::where('role', 'client')->inRandomOrder()->first();
            },
            'ref' => $this->faker->unique()->numerify('DEVI-####'), // Génération d'une référence unique.
        ];
    }
}
