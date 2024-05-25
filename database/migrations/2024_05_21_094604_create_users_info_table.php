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
        Schema::create('users_info', function (Blueprint $table) {
            $table->id();
			$table->uuid('bind_id')->unique()->nullable();
            $table->enum('accountType', ['Recruiter', 'Employee', 'Organzation'])->nullable();
            $table->integer('countryPhoneCode')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->integer('zonalCode')->nullable();
			
			$table->foreign('bind_id')->references('bind_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_info');
    }
};
