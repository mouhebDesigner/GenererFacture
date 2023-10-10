<?php

namespace Database\Factories;

use App\Models\Tache;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'quantite' => $this->faker->numberBetween(1, 10),
            'prixUnitaire' => $this->faker->randomFloat(2, 10, 100),
            'prixHT' => $this->faker->randomFloat(2, 10, 1000),
            'facture_id' => function () {
                // Vous pouvez utiliser la relation One-to-Many avec Facture ici pour générer une facture associée.
                return \App\Models\Facture::inRandomOrder()->first();
            },
            'devi_id' => function () {
                // Vous pouvez utiliser la relation Many-to-One avec Devi ici pour générer un devis associé.
                return \App\Models\Devi::inRandomOrder()->first();
            },
            'service_id' => function () {
                // Vous pouvez utiliser la relation Many-to-One avec Service ici pour générer un service associé.
                return \App\Models\Service::inRandomOrder()->first();
            },
        ];
    }
}
