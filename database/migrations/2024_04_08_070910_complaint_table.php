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
        Schema::create('Complaint', function (Blueprint $table) {
            $table->id('complaint_id');
            $table->string('complainant_id', 10);
            $table->string('complainee_id', 10);
            $table->string('complainee_name', 255);
            $table->date('apprehension_date');
            $table->time('apprehension_time');
            $table->string('location', 100);
            $table->text('nature_and_cause');
            $table->date('submission_date');
            $table->enum('status', ['Resolved', 'Penalized', 'Ongoing', 'Complaint Submitted']);
    
            $table->foreign('complainant_id')->references('complainant_id')->on('Complainant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Complaint');
    }
};
