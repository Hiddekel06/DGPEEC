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
        Schema::table('authorized_agents', function (Blueprint $table) {
            $table->foreignId('direction_id')->nullable()->constrained('directions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authorized_agents', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Direction::class);
        });
    }
};
