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
        Schema::create('mc_answer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('option_id')->constrained('mc_options')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('mc_questions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc_answer');
    }
};