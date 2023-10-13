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
        Schema::create('curriculumn_subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculumn_id');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('curriculumn_id')->references('id')->on('curriculumns')->cascadeOnDelete();
            $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculumn_subjects');
    }
};
