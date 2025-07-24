<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->smallInteger('order')->default(1);
            $table->unsignedBigInteger('category_id');
            $table->integer('code');
            $table->decimal('price', 10, 2);
            $table->json('sales_locations')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unique(['category_id', 'code']);
            $table->foreign('category_id')->references('id')->on('products_categories')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};