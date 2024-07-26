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
        Schema::create('bookstore', function (Blueprint $table) {
            $table->increments('bookstore_id');
            $table->string('name', 50)->unique();
            $table->string('phone_no', 10)->nullable();
            $table->string('email', 225)->nullable();
            $table->string('city', 90);
            $table->string('street_name', 50);
            $table->char('postcode', 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookstore');
    }
};
