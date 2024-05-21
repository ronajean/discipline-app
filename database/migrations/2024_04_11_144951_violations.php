<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->string('year');
            $table->string('block');
            $table->timestamp('date_and_time');
            $table->string('offense');
            $table->string('reported_by');
            $table->string('office');
            $table->string('contact_number');
            $table->boolean('acknowledgement');
            $table->string('student_signature');
            $table->string('student_contact_number');
            $table->string('reference_record');
            $table->string('verified_by');
            $table->text('remarks');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('violations');
    }
};
