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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(); // L'identifiant de l'utilisateur qui a passé la commande
            $table->string('reference')->unique();
            $table->string('name'); 
            $table->string('tel')->nullable(); 
            $table->string('email'); 
            $table->string('address'); 
            $table->string('status')->default('pending'); // Statut de la commande (pending, completed, canceled)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
