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
        Schema::create('user_questionnaire', function (Blueprint $table) {
            $table->id();
            // Submission data:
            $table->timestamp('completed_at')->nullable();
            // Relations:
            $table->foreignId('user_id')->constrained();
            $table->foreignId('questionnaire_id')->constrained();
            $table->unique(['user_id', 'questionnaire_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_questionnaire');
    }
};
