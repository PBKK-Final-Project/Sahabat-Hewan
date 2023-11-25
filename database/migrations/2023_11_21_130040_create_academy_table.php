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
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->string('releaseDate');
            $table->string('lastUpdated');
            $table->string('memberCount');
            $table->string('duration');
            $table->string('level');
            $table->string('instructor');
            $table->string('category');
            $table->string('additional_materials');
            $table->string('certificate');
            $table->string('consult');
            $table->string('youtubeLink');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academies');
    }
};
