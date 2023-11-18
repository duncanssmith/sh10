<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoversTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('covers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('slug')->unique();
            $table->string('media', 255)->nullable();
            $table->string('dimensions', 32)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('notes', 255)->nullable();
            $table->string('cover_date', 32)->nullable();
            $table->boolean('is_current')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covers');
    }
};
