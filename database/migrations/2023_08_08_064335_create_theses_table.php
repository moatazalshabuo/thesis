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
        Schema::create('theses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("students_id")->constrained("users")->cascadeOnDelete();
            $table->string('title_thesis',100);
            $table->string('en_title',100);
            $table->tinyInteger('status')->default(0);
            $table->text("descripe")->nullable();
            $table->string("file",255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theses');
    }
};
