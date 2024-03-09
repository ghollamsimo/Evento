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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('localisation');
            $table->text('description');
            $table->string('image');
            $table->date('date');
            $table->integer('capacity');
            $table->foreignId('categorie_id')->nullable()->constrained('categories');
            $table->boolean('status')->default(0);
            $table->enum('etat', ['Automatique', 'Manuelle'])->default('Automatique');
            $table->timestamps();
            $table->foreignId('organizer_id')->nullable()->constrained('organizers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
