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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->text('about_course')->nullable();
            $table->text('why_join_the_course')->nullable();
            $table->string('instructor_name')->nullable();
            $table->string('instructor_designation')->nullable();
            $table->text('instructor_details')->nullable();
            $table->float('mrp')->default(0.00);
            $table->float('sellable_price')->default(0.00);
            $table->tinyInteger('is_popular')->default(0)->nullable();
            $table->tinyInteger('show_on_home')->default(0)->nullable();
            $table->string('featured_image')->nullable();
            $table->tinyInteger('is_certificate')->default(0)->nullable();
            $table->string('certificate_file')->nullable();
            $table->string('language')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->integer('order_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
