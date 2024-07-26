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
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('staff_id');
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->string('username', 30)->unique();
            $table->string('password', 60);
            $table->string('phone_no', 10);
            $table->string('emergency_no', 10);
            $table->string('email', 225)->unique();
            $table->string('city', 90);
            $table->string('street_name', 50);
            $table->char('postcode', 8);
            $table->integer('sick_days')->default(0)->check('sick_days >= 0');
            $table->text('accidents_report')->nullable();
            $table->unsignedBigInteger('bookstore_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('bookstore_id')->references('bookstore_id')->on('bookstore')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('role')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
