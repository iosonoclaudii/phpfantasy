<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Esegui la migrazione.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relazione con l'utente
            $table->integer('correct_guesses')->default(0); // Indovinati
            $table->integer('total_guesses')->default(0);   // Totali
            $table->timestamps();

            // Relazione con la tabella users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Annulla la migrazione.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
