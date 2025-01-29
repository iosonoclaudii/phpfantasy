<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('creatures', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome della creatura
            $table->integer('hunger')->default(100); // Fame (0-100)
            $table->integer('energy')->default(100); // Energia (0-100)
            $table->integer('happiness')->default(100); // Felicità (0-100)
            $table->enum('status', ['alive', 'dead'])->default('alive'); // Stato
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creatures');
    }
};
