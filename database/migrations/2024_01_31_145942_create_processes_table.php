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
            $table->integer('creator');
            $table->integer('responsible');
            $table->integer('represented');
            $table->integer('department');
            $table->integer('categorie');
            $table->integer('offset_days');
            $table->string('status');
            $table->integer('last_updated_by');
            $table->boolean('is_active');
            $table->integer('next');
            $table->integer('previous');
            $table->integer('parent');
            $table->dateTime('date');
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
