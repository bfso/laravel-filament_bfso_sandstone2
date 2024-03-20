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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->string('title');
            $table->unsignedBigInteger('responsible_id'); 
            $table->unsignedBigInteger('deputy_id')->nullable(); 
            $table->string('department')->nullable();
            $table->integer('offset')->default(0);
            $table->unsignedBigInteger('predecessor_id')->nullable(); 
            $table->unsignedBigInteger('successor_id')->nullable(); 
            $table->string('categories')->nullable();
            $table->boolean('completed')->default(false); 
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('responsible_id')->references('id')->on('users');
            $table->foreign('deputy_id')->references('id')->on('users');
            $table->foreign('predecessor_id')->references('id')->on('activities');
            $table->foreign('successor_id')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
