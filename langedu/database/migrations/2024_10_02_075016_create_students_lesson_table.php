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
        Schema::create('students_lesson', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table -> foreignId('students_id')->references('id')->on('lesson')->onDelete('cascade');
            $table -> foreignId('lesson_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_lesson');
    }
};
