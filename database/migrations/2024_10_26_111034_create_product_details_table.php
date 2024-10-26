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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('color')->default('Blanc');
            $table->string('material')->default('100% coton');
            $table->string('sleeve_type')->default('Manches courtes');
            $table->string('collar_type')->default('Col rond');
            $table->string('fit')->default('Coupe droite');
            $table->string('size_available')->default('S, M, L, XL');
            $table->string('care_instructions')->default('Lavable en machine à 30°C');
            $table->string('tags')->nullable();
            $table->string('image_url')->default('/images/product-detail-01.jpg');
            $table->decimal('rating', 2, 1)->default(4.5);
            $table->integer('sales_count')->default(0);
            $table->decimal('discount', 5, 2)->default(0.0);
            $table->date('discount_end_date')->nullable()->default('2024-12-31');
            $table->date('added_date')->nullable()->default(now());
            $table->text('long_description')->nullable();

            // Définir la clé étrangère
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
