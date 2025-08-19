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
        Schema::create('course_lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_module_id');
            $table->string('title')->nullable();
            $table->enum('type', ['text', 'video', 'quiz', 'downloadable'])->nullable();
            $table->text('content')->nullable();
            $table->string('video_url')->nullable();
            $table->string('downloadable_file')->nullable();
            $table->integer('order_no')->nullable();
            $table->foreign('course_module_id')->references('id')->on('course_modules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_lessons');
    }
};
