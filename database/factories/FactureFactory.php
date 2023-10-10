<?php

namespace Database\Factories;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class FactureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'devi_id' => function () {
                // Vous pouvez utiliser la relation One-to-One avec Devi ici pour générer un devis associé.
                return \App\Models\Devi::inRandomOrder()->first();
            },
            'ref' => $this->faker->unique()->numerify('FACT-####'), // Génération d'une référence unique.
        ];
    }
}
