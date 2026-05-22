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
        Schema::table('hero_slides', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->string('title_zh')->nullable()->after('title_en');
            $table->text('subtitle_en')->nullable()->after('subtitle');
            $table->text('subtitle_zh')->nullable()->after('subtitle_en');
            $table->string('cta_text_en')->nullable()->after('cta_text');
            $table->string('cta_text_zh')->nullable()->after('cta_text_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_slides', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'title_zh', 'subtitle_en', 'subtitle_zh', 'cta_text_en', 'cta_text_zh']);
        });
    }
};
