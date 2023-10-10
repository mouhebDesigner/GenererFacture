<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('ref')->unique(); // Numéro de facture unique
            $table->foreignId('devi_id')->nullable()->constrained('devis')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('factures');
    }
}
