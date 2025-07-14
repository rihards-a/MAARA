<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., "Dators", "Telefons"
            $table->string('importance'); // e.g., "Ļoti svarīga", "Diezgan svarīga", "Mazsvarīga"
            $table->string('access_method'); // e.g., "Ierīcei nav paroles", "Ierakstīju piekļuves datus Lastpass", etc.
            $table->string('action_after_death'); // e.g., "Nekavējoties visu informāciju dzēst"
            $table->text('comments')->nullable(); // Additional comments
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
