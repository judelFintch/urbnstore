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
        Schema::create('details_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('product_title');
            $table->decimal('product_price', 8, 2); 
            $table->text('product_description'); //
            $table->string('status')->default('pending'); // Statut de la commande (pending, completed, canceled)
            $table->unsignedBigInteger('order_id');
           // $table->foreign('order_id')->references('id')->on('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_orders');
    }
};
