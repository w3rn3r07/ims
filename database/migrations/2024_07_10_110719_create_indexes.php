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
        Schema::table('store_stock', function (Blueprint $table) {
            $table->index('bookstore_id', 'ix_store_stock_bookstore_id');
        });

        Schema::table('book', function (Blueprint $table) {
            $table->index('publisher_id', 'ix_book_publisher_id');
        });

        Schema::table('storestock_book', function (Blueprint $table) {
            $table->index('storestock_id', 'ix_storestock_book_storestock_id');
            $table->index('book_id', 'ix_storestock_book_book_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->index('supplier_id', 'ix_orders_supplier_id');
            $table->index('storestock_id', 'ix_orders_storestock_id');
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->index('role_id', 'ix_staff_role_id');
            $table->index('bookstore_id', 'ix_staff_bookstore_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_stock', function (Blueprint $table) {
            $table->dropIndex('ix_store_stock_bookstore_id');
        });

        Schema::table('book', function (Blueprint $table) {
            $table->dropIndex('ix_book_publisher_id');
        });

        Schema::table('storestock_book', function (Blueprint $table) {
            $table->dropIndex('ix_storestock_book_storestock_id');
            $table->dropIndex('ix_storestock_book_book_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('ix_orders_supplier_id');
            $table->dropIndex('ix_orders_storestock_id');
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->dropIndex('ix_staff_role_id');
            $table->dropIndex('ix_staff_bookstore_id');
        });
    }
};
