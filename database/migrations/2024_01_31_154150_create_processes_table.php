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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->foreignId('creator')->references('id')->on('users');
            $table->foreignId('responsible')->references('id')->on('users');
            $table->foreignId('represented')->references('id')->on('users');
  
            $table->integer('department')->references('id')->on('departments');
            $table->integer('categorie')->references('id')->on('categories');
            $table->integer('offset_days');
            $table->enum('status',['is_active', 'is_open','is_processing','is_late','is_successful']);
            $table->integer('last_updated_by')->references('id')->on('users');
            $table->boolean('is_active');
            $table->integer('next')->references('id')->on('processes');
            $table->integer('previous')->references('id')->on('processes');
            $table->integer('parent')->references('id')->on('processes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
