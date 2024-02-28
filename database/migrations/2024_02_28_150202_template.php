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
            $table->string('creator');
            $table->string('responsible');
            $table->string('represented');
            $table->string('last_updated_by');
            $table->boolean('is_active');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
