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
        Schema::create('mcquestions_mcoptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->references('id')->on('mc_questions')->onDelete('cascade');
            $table->foreignId('option_id')->references('id')->on('mc_options')->onDelete('cascade');
            $table->unique(['question_id', 'option_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcquestions_mcoptions');
    }
};
