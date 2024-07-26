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
        //Adding an enum variable for book status using sql create enum statement
        DB::statement("DO $$ 
            BEGIN
                IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'book_status') THEN
                    CREATE TYPE book_status AS ENUM ('In Stock', 'Out of Stock');
                END IF;
            END
            $$");

        Schema::create('store_stock', function (Blueprint $table) {
            $table->increments('storestock_id');
            $table->string('SKU', 30)->unique();
            $table->integer('current_stock')->unsigned();
            $table->integer('min_stock')->nullable()->unsigned();
            $table->integer('max_stock')->unsigned();
            $table->enum('status', ['In Stock', 'Out of Stock'])->default('In Stock');
            $table->unsignedInteger('bookstore_id');
            $table->foreign('bookstore_id')->references('bookstore_id')->on('bookstore')->onDelete('cascade');
            $table->timestamps();
        });

        // Adding constraints using sql statements
        DB::statement("ALTER TABLE store_stock ADD CONSTRAINT check_current_stock CHECK (current_stock >= 0)");
        DB::statement("ALTER TABLE store_stock ADD CONSTRAINT check_min_stock CHECK (min_stock IS NULL OR min_stock >= 0)");
        DB::statement("ALTER TABLE store_stock ADD CONSTRAINT check_max_stock CHECK (max_stock > 0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_stock');
        DB::statement("DROP TYPE IF EXISTS book_status");
    }
};
