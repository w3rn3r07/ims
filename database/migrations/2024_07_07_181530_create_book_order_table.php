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
        Schema::create('book_order', function (Blueprint $table) {
            $table->unsignedBigInteger('order_no');
            $table->unsignedBigInteger('book_id');
            $table->primary(['order_no', 'book_id']); // Primary Keys for both IDs (Composite Key Creation)
            $table->foreign('order_no')->references('order_no')->on('orders')->onDelete('cascade');
            $table->foreign('book_id')->references('book_id')->on('book')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_order');
    }
};
