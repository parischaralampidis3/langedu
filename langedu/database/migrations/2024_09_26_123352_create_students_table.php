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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('user_id')->constrained()->onDelete('cascade');
            $table -> string('username');
            $table -> string('firstname');
            $table -> string('lastname');
            $table -> string('email')->unique();
            $table -> tinyInteger('is_suspended')->default(0);
            $table -> date('dob');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        
    }
};
