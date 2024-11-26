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
        Schema::create('employee_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date')->nullable();
            $table->string('in_time')->nullable();
            $table->string('out_time')->nullable();
            $table->string('total_availability')->nullable();
            $table->string('break_time')->nullable();
            $table->string('worked_hours')->nullable();
            $table->string('work_report')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_statuses');
    }
};
