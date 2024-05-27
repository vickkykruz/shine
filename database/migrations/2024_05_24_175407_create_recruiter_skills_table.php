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
        Schema::create('recruiter_skills', function (Blueprint $table) {
            $table->id();
            $table->uuid('bind_id')->nullable();
			$table->enum('table_type', ['DesiredJob', 'PreferredJob', 'EmployeeTable'])->nullable();
			$table->unsignedBigInteger('job_id')->nullable();
			$table->string('skill')->nullable();
			
			// Foreign key constraints
            
            $table->foreign('bind_id')->references('bind_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiter_skills');
    }
};
