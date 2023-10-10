<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                "nom" => "admin",
                "prenom" => "admin",
                "adresse" => "tunis",
                "telephone" => 12333222,
                "avatar" => "images/K8iymhCNMkIVkSsrYBPhyoHzcsDM5MF2fvlJqWu7.jpg",
                "role" => "entreprise",
                "email" => "admin@gmail.com",
                "password" => Hash::make('adminadmin'),
            ],
            [
                "nom" => "Client",
                "prenom" => "Client",
                "adresse" => "tunis",
                "telephone" => 12333222,
                "avatar" => "images/K8iymhCNMkIVkSsrYBPhyoHzcsDM5MF2fvlJqWu7.jpg",
                "role" => "client",
                "email" => "client@gmail.com",
                "password" => Hash::make('adminadmin'),
            ],
            [
                "nom" => "Client 2",
                "prenom" => "Client 2",
                "adresse" => "tunis",
                "telephone" => 43444555,
                "avatar" => "images/K8iymhCNMkIVkSsrYBPhyoHzcsDM5MF2fvlJqWu7.jpg",
                "role" => "client",
                "email" => "client2@gmail.com",
                "password" => Hash::make('adminadmin'),
            ],

        ]);

        \App\Models\Service::factory(4)->create();
        \App\Models\Devi::factory(2)->create();
        \App\Models\Facture::factory(4)->create();
        \App\Models\Tache::factory(20)->create();

        DB::table('devi_service')->insert([
            [
                "devi_id" => 1,
                "service_id" => 1
            ],
            [
                "devi_id" => 1,
                "service_id" => 2
            ],
            [
                "devi_id" => 2,
                "service_id" => 3
            ]
        ]);
       

    }
}
