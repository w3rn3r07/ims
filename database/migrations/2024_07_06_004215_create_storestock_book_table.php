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
        Schema::create('storestock_book', function (Blueprint $table) {
            $table->unsignedBigInteger('storestock_id');
            $table->unsignedBigInteger('book_id');
            $table->primary(['storestock_id', 'book_id']); // Primary Key for both IDs (Composite Key Creation)
            $table->foreign('storestock_id')->references('storestock_id')->on('store_stock')->onDelete('cascade');
            $table->foreign('book_id')->references('book_id')->on('book')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storestock_book');
    }
};
