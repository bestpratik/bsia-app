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
        Schema::table('quizzes', function (Blueprint $table) {
            $table->renameColumn('module_id', 'course_module_id');
        });

        Schema::table('quizzes', function (Blueprint $table) {
            $table->unsignedBigInteger('course_module_id')->change();

            $table->foreign('course_module_id')
                ->references('id')
                ->on('course_modules')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign(['course_module_id']);
            $table->renameColumn('course_module_id', 'module_id');
        });

        Schema::table('quizzes', function (Blueprint $table) {
            $table->integer('module_id')->change();
            $table->foreign('module_id')
                ->references('id')
                ->on('course_modules')
                ->onDelete('cascade');
        });
    }
};
