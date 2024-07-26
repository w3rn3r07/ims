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
        //Adding an enum variable option for order status using sql
        DB::statement("DO $$ 
            BEGIN
                IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'order_status') THEN
                    CREATE TYPE order_status AS ENUM ('Pending', 'Completed');
                END IF;
            END
            $$");

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_no');
            $table->timestamp('purchase_date');
            $table->integer('quantity');
            $table->timestamp('ETA');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['Pending', 'Completed'])->default('Pending');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('storestock_id');
            $table->foreign('supplier_id')->references('supplier_id')->on('supplier')->onDelete('cascade');
            $table->foreign('storestock_id')->references('storestock_id')->on('store_stock')->onDelete('cascade');
            $table->timestamps();
        });

        // Adding constraints using SQL
        DB::statement("ALTER TABLE orders ADD CONSTRAINT check_quantity CHECK (quantity > 0)");
        DB::statement("ALTER TABLE orders ADD CONSTRAINT check_price CHECK (price > 0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        DB::statement("DROP TYPE IF EXISTS order_status");
    }
};
