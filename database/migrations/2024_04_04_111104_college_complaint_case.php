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
        Schema::create('college_complaint_case', function (Blueprint $table){
            $table->string('complaint_id',11)->unique();
            $table->string('complainant_stud_name');
            $table->string('complainant_stud_num');
            $table->string('complainant_stud_course');
            $table->string('complainant_stud_college');
            $table->string('complainant_year_and_block');
            $table->json('list_of_complainee')->nullable();
            $table->dateTime('date_and_time_sent');
            $table->string('description', 1000);

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
