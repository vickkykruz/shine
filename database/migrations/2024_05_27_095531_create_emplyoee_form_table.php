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
        Schema::create('emplyoee_form', function (Blueprint $table) {
            $table->id();
			$table->uuid('bind_id')->nullable();
			$table->text('personal_bio')->nullable();
			$table->string('job_title')->nullable();
			$table->string('department')->nullable();
			$table->string('company_id_path', 2048)->nullable();
			
			// Implement start date and end date
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();

			$table->enum('employment_mode', ['Full', 'Part', 'Contract', 'Temporary'])->nullable();
			$table->string('interest')->nullable();
			$table->enum('identity_type', ['ID Card', 'Driver License', 'Passport'])->nullable();
			$table->string('identity_path', 2048)->nullable();
			$table->string('linkedin_url')->nullable();
			$table->enum('argement_con', ['Yes', 'No'])->nullable();
			
			// Foreign key
			$table->foreign('bind_id')->references('bind_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplyoee_form');
    }
};
