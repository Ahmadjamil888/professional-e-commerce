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
            $table->string('name');                    // Product name
            $table->text('description')->nullable();   // Optional description
            $table->decimal('price', 10, 2);           // Price (e.g. 9999.99 max)
            $table->integer('stock');                  // Stock quantity
            $table->string('image')->nullable();       // Image path (optional)
            $table->timestamps();                      // created_at and updated_at
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
