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
            $table->id();
            $table->integer('user_id');
            $table->string('employee_name')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('designation')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('phone_number')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->string('aadhar_number')->unique()->nullable();
            $table->string('pan_number')->unique()->nullable();
            $table->string('account_number')->unique()->nullable();
            $table->string('ifsc_code')->nullable();
            $table->timestamps();
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
