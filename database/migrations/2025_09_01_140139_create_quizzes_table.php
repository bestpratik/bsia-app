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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_module_id');
            $table->text('question')->nullable();
            $table->text('option_one')->nullable();
            $table->text('option_two')->nullable();
            $table->text('option_three')->nullable();
            $table->text('option_four')->nullable();
            $table->text('correct_answer')->nullable();
            $table->timestamps();
            $table->foreign('course_module_id')->references('id')->on('course_modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
