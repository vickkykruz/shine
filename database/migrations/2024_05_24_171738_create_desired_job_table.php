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
        Schema::create('desired_job', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('recruiterInfoId')->nullable();
            $table->uuid('bind_id')->nullable();
			$table->string('desired_job_title')->nullable();
			$table->string('job_position')->nullable();
			$table->enum('responsibility_level', ['High', 'Medium', 'Low'])->nullable();
			$table->string('portfolio_url')->nullable();
			$table->string('linkedIn_url')->nullable();
			
			// Foreign key constraints
            $table->foreign('recruiterInfoId')->references('id')->on('recruiter_info')->onDelete('cascade');
            $table->foreign('bind_id')->references('bind_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desired_job');
    }
};
