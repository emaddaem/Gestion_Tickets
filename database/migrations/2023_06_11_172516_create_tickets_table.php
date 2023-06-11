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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->unsignedBigInteger('statut_id')->nullable();
            $table->unsignedBigInteger('priorite_id')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('users');
            $table->foreign('statut_id')->references('id')->on('statuts');
            $table->foreign('priorite_id')->references('id')->on('priorites');
            $table->foreign('categorie_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
