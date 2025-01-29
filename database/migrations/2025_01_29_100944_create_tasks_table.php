<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // ID dell'utente
        $table->string('title'); // Titolo dell'attività
        $table->text('description')->nullable(); // Descrizione (opzionale)
        $table->boolean('completed')->default(false); // Stato completamento
        $table->timestamps();

        // Relazione con la tabella users
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
