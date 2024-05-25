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
        Schema::create('recruiter_info', function (Blueprint $table) {
            $table->id();
			$table->uuid('bind_id')->unique()->nullable();
			$table->text('personal_bio')->nullable();
			$table->string('resume_path', 2048)->nullable();
			$table->enum('employMode', ['Full', 'Part', 'Contract', 'Temporary'])->nullable();
			$table->enum('desiredJobQues', ['yeah', 'none'])->nullable();
			
			$table->foreign('bind_id')->references('bind_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiter_info');
    }
};
