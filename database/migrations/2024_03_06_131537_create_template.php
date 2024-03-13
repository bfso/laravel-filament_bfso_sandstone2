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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('last_update_by')->references('id')->on('users');
            $table->foreignId('creator')->references('id')->on('users');
            $table->foreignId('responsible')->references('id')->on('users');
            $table->foreignId('represented')->references('id')->on('users');
            $table->boolean('is_active')->default(true);
            $table->timestamp('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
