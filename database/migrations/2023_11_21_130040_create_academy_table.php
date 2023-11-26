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
            $table->string('title'); // done
            $table->text('description'); //done
            $table->decimal('price', 8, 2); //done
            $table->string('image'); //done
            $table->string('memberCount'); // default 0
            $table->string('duration');
            $table->string('level'); //done
            $table->string('instructor'); //done
            $table->string('category'); //done
            $table->string('additional_materials'); //done
            $table->string('certificate'); //done
            $table->string('consult'); //done
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
