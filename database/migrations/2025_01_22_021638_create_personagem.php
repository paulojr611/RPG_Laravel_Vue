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
        Schema::create('personagem', function (Blueprint $table) {
            $table->id(); 
            $table->string('nome'); 
            $table->integer('vida')->default(1); 
            $table->integer('vidaMax')->default(1); 
            $table->integer('mana')->default(0); 
            $table->integer('manaMax')->default(0); 
            $table->integer('ca')->default(10); 
            $table->integer('DR')->default(0); 
            $table->integer('nivel')->default(1); 
            $table->integer('moedas')->default(0); 
            $table->integer('xp')->default(0); 
            $table->timestamps(); 
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personagem');
    }
};
