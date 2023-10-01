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
        Schema::create('samples', function (Blueprint $table) {
            $table->id();

//            $table->foreignId('user_id')->constrained(); ask about nullable
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name', 50);
            $table->string('audio_file', 255);
            $table->text('description');
            $table->string('cover', 255);

            // Define the foreign key constraint
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
