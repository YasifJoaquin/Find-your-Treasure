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
        Schema::create('objetos', function (Blueprint $table) {
            $table->id();
            $table->string('objeto');
            $table->string('marca')->nullable();
            $table->string('color');
            $table->string('ubicacion');
            $table->string('descripcion')->nullable(); //la descripcion seria el estado del objeto(que estan el figma)
            $table->unsignedBigInteger('valor_sentimental')->nullable();
            $table->unsignedBigInteger('estado');
            $table->string('imagen', 2048)->nullable();
            $table->foreignId('user_id')
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
        Schema::dropIfExists('objetos');
    }
};
