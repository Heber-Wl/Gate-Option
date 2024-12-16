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
        Schema::create('lucro_empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')->constrained('empresas', 'id');
            $table->foreignId('id_investimento')->constrained('dados_investimento', 'id');
            $table->foreignId('id_user')->constrained('dados', 'id');
            $table->string('valor_investido');
            $table->string('mes_1');
            $table->string('mes_2');
            $table->string('mes_3');
            $table->string('mes_4');
            $table->string('mes_5');
            $table->string('mes_6');
            $table->string('mes_7');
            $table->string('mes_8');
            $table->string('mes_9');
            $table->string('mes_10');
            $table->string('mes_11');
            $table->string('mes_12');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lucro_empresas');
    }
};
