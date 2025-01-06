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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('company_name');
            $table->string('company_logo')->nullable(); // To store company logo file name
            $table->string('experience'); // Experience required, could be a text or range
            $table->string('salary', 10, 2)->nullable(); // Salary
            $table->string('location');
            $table->json('skills'); // This could store skills in a JSON format
            $table->text('extra')->nullable(); // Additional information
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
