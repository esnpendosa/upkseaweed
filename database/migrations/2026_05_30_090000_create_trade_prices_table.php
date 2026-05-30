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
        Schema::create('trade_prices', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->comment('e.g., Dried Cottonii, Gracilaria SP');
            $table->string('quality_specs')->nullable()->comment('e.g., Moisture ≤38%, Impurities ≤3%');
            $table->string('reference_price')->comment('e.g., Rp 28.500/kg or Contact Us');
            $table->string('market_trend')->comment('e.g., +2.5%, -1.2%, or Stable');
            $table->enum('trend_direction', ['up', 'down', 'stable'])->default('stable');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_prices');
    }
};
