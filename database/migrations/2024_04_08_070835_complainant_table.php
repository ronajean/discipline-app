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
        Schema::create('Complainant', function (Blueprint $table) {
            $table->string('complainant_id', 10)->primary();
            $table->string('last_name', 55);
            $table->string('first_name', 55);
            $table->string('middle_name', 55)->nullable();
            $table->string('middle_initial', 5)->nullable();
            $table->string('college_office', 100);
            $table->string('contact_number', 15);
            $table->string('email', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Complainant');
    }
};
