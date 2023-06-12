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
        Schema::create('agradecimientos', function (Blueprint $table) {
            $table->id();
            $table->longText('texto');

            $table->foreignId('user_id') //id del usuario que escribe un agrdecimiento
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('objeto_id') // cada objeto tiene su propio user id, por lo que se puede, con la relacion, ver a que usuario se le esta enviando un agradecimiento
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agradecimientos');
    }
};
