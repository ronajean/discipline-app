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
        Schema::create('list_of_complainees', function (Blueprint $table){
            $table->string('complainee_stud_id');
            $table->string('complainee_stud_num');
            $table->string('complainee_stud_course');
            $table->string('complainee_stud_college');
            $table->string('complainee_year_and_block');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
