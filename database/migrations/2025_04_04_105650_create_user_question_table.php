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
        Schema::create('user_question', function (Blueprint $table) {
            $table->id();
            // Response data:
            $table->text('response_text')->nullable();
            $table->string('response_value')->nullable();
            $table->timestamp('submitted_at')->nullable();
            // Relations:
            $table->foreignId('user_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->unique(['user_id', 'question_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_question');
    }
};
