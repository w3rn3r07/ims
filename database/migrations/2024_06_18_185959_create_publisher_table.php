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
        Schema::create('publisher', function (Blueprint $table) {
            $table->increments('publisher_id');
            $table->string('name', 50);
            $table->string('phone_no', 10);
            $table->string('email', 225)->unique();
            $table->string('address', 300);
            $table->unsignedInteger('author_id')->nullable();
            $table->foreign('author_id')->references('author_id')->on('author')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publisher');
    }
};
