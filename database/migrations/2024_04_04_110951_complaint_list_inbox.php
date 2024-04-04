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
        //
        Schema::create('complaint_inbox', function (Blueprint $table){
            $table->string('complaint_id',11)->unique();
            $table->string('stud_id');
            $table->string('stud_num');
            $table->string('stud_course');
            $table->string('stud_college');
            $table->dateTime('date_and_time_sent');
            $table->string('description', 1000);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('users');
    }
};
