<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('title', 50);
            $table->string('genre', 30);
            $table->string('language', 3);
            $table->text('description')->nullable();
            $table->string('isbn', 13)->unique();
            $table->integer('year');
            $table->string('edition', 15);
            $table->smallInteger('no_of_pages');
            $table->string('cover_type', 30);
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('publisher_id');
            // $table->unsignedBigInteger('storestock_id');
            $table->foreign('publisher_id')->references('publisher_id')->on('publisher');
            // $table->foreign('storestock_id')->references('storestock_id')->on('store_stock');
            $table->timestamps();
        });

        // Adding constraints using sql statements
        DB::statement("ALTER TABLE book ADD CONSTRAINT check_year CHECK (year > 1800)");
        DB::statement("ALTER TABLE book ADD CONSTRAINT check_no_of_pages CHECK (no_of_pages > 0)");
        DB::statement("ALTER TABLE book ADD CONSTRAINT check_price CHECK (price > 0.00)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
