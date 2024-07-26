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
        Schema::create('role', function (Blueprint $table) {
            $table->increments('role_id');
            $table->string('role_title', 50);
            $table->decimal('monthly_salary', 10, 2); // Allow NULL but check if present
            $table->decimal('pay_rate', 10, 2);
            $table->timestamps();
        });

        // Adding constraints using SQL for CHECK constraints
        DB::statement("ALTER TABLE role ADD CONSTRAINT check_monthly_salary CHECK (monthly_salary IS NULL OR monthly_salary > 0)");
        DB::statement("ALTER TABLE role ADD CONSTRAINT check_pay_rate CHECK (pay_rate > 0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
