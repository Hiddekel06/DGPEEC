<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delc_diplome_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_collection_id')->constrained()->onDelete('cascade');
            $table->string('diplome'); // Nom du diplôme
            $table->integer('nb_demandes_classement')->default(0);
            $table->integer('nb_attestations_classement')->default(0);
            $table->integer('nb_lettres_non_classement')->default(0);
            $table->text('motif_non_classement')->nullable();
            $table->integer('avec_equivalence')->default(0);
            $table->integer('sans_equivalence')->default(0);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['data_collection_id', 'deleted_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delc_diplome_lines');
    }
};
