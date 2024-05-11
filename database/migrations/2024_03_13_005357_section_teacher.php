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
        Schema::create('section_teacher', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teachers_id')->unsigned();
            $table->foreign('teachers_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('Sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_teacher');
    }
};
