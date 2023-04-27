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
        Schema::table('search_results', function (Blueprint $table) {
            $table->json('payload')->nullable()->after('results');
            $table->boolean('is_envelope')->default(false)->after('to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('search_results', function (Blueprint $table) {
            $table->dropColumn('is_envelope');
            $table->dropColumn('payload');
        });
    }
};
