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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('employee_id', 10)->primary();
            $table->unsignedBigInteger('id'); // New column for foreign key
            $table->string('last_name', 55);
            $table->string('first_name', 55);
            $table->string('middle_name', 55)->nullable();
            $table->string('designation', 100);
            $table->string('email', 75);
            $table->string('department', 75);
            $table->timestamps(); // Add timestamps for created_at and updated_at columns

            $table->foreign('id')->references('id')->on('users'); // Foreign key 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
