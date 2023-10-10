<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('ref')->unique(); // Numéro de facture unique
            $table->decimal('sous_total', 10, 2)->default(0)->nullable();
            $table->decimal('total_ttc', 10, 2)->default(0)->nullable();
            $table->decimal('remise', 10, 2)->default(0)->nullable();
            $table->decimal('taux_tva', 5, 2)->default(0)->nullable(); 
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps(); // Champs pour la date de création et la date de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devis');
    }
}
