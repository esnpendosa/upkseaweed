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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('grade_type')->comment('e.g., Cottonii, Spinosum, Gracilaria');
            $table->string('moisture_content')->nullable()->comment('e.g., ≤38%');
            $table->string('impurity_content')->nullable()->comment('e.g., ≤2%');
            $table->text('packaging_details')->nullable()->comment('e.g., 50kg Bale, Compressed');
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
