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
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id', 10)->primary();
            $table->unsignedBigInteger('id'); // New column for foreign key
            $table->string('last_name', 55);
            $table->string('first_name', 55);
            $table->string('middle_name', 55)->nullable();
            $table->string('middle_initial', 5)->nullable();
            $table->string('name_extension', 10)->nullable();
            $table->enum('sex', ['M', 'F']);
            $table->string('course_id', 15);
            $table->string('mobile_no', 15);
            $table->string('plm_email', 75);
            $table->string('personal_email', 75);
            $table->string('home_telephone_no', 15)->nullable();
            $table->string('home_address', 255);
            $table->string('guardian_name', 100);
            $table->string('guardian_contact_no', 15);
            
            
            $table->foreign('course_id')->references('course_id')->on('course');
            $table->foreign('id')->references('id')->on('users'); // Foreign key 
        });
    }

    /**S
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
