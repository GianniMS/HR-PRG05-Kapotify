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
        Schema::create('genre_sample', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained()->onDelete('cascade');
            $table->foreignId('sample_id')->constrained()->onDelete('cascade');
            $table->primary(['genre_id', 'sample_id']);

            $table->timestamp('date_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_sample');
    }
};
