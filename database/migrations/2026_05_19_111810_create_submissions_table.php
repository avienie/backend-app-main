<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('week');
            $table->string('drive_link');
            $table->timestamps();

            $table->unique(['user_id', 'week']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};