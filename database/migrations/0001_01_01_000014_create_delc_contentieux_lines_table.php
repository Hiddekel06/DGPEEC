<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delc_contentieux_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_collection_id')->constrained()->onDelete('cascade');
            $table->string('corps'); // Corps ou Emplois
            $table->string('sexe'); // M/F
            $table->string('sanction'); // Type d'acte pris
            $table->text('motif')->nullable(); // Motif du traitement
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['data_collection_id', 'deleted_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delc_contentieux_lines');
    }
};
