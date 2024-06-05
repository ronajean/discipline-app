<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complaints_inbox', function (Blueprint $table) {
            $table->id();
            $table->string('student_no', 10);
            $table->string('last_name', 255);
            $table->string('first_name', 255);
            $table->string('middle_name', 255);
            $table->date('apprehension_date');
            $table->time('apprehension_time');
            $table->string('location', 255);
            $table->longText('description');
            $table->dateTime('date_time_sent')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints_inbox');
    }
};
