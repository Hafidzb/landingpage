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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Menambahkan kolom 'name'
            $table->string('name')->nullable();
            // Menambahkan kolom 'price' - Hapus '.after('name')' karena ini untuk CREATE TABLE
            $table->decimal('price', 10, 2)->nullable();
            // Menambahkan kolom 'description'
            $table->text('description')->nullable();
            // Menambahkan kolom 'image_url'
            $table->string('image_url')->nullable();
            // Menambahkan kolom is_promo (boolean, default false)
            $table->boolean('is_promo')->default(false);
            // Menambahkan kolom discount (desimal, bisa nullable, default 0.0)
            $table->decimal('discount', 8, 2)->default(0.00);
            // Menambahkan kolom is_new (boolean, default true)
            $table->boolean('is_new')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
