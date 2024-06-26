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
        Schema::create('verify_contacts', function (Blueprint $table) {
            $table->id();
			$table->uuid('bind_id')->unique()->nullable();
            $table->text('email_verify_status')->nullable();
            $table->text('mobile_number_verify_status')->nullable();
			
			$table->foreign('bind_id')->references('bind_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verify_contacts');
    }
};
