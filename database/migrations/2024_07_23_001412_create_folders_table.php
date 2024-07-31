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
        Schema::create('folders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('parent_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('status')->nullable();

            $table->string('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->nullable();

            //Options
            $table->boolean('is_protected')->default(false)->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_hidden')->default(false)->nullable();
            $table->boolean('is_favorite')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
