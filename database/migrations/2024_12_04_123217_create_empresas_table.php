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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_empresa');
            $table->decimal('valor_mercado');
            $table->decimal('qtd_acoes');
            $table->decimal('preco_acao');
            $table->decimal('mes_1');
            $table->decimal('mes_2');
            $table->decimal('mes_3');
            $table->decimal('mes_4');
            $table->decimal('mes_5');
            $table->decimal('mes_6');
            $table->decimal('mes_7');
            $table->decimal('mes_8');
            $table->decimal('mes_9');
            $table->decimal('mes_10');
            $table->decimal('mes_11');
            $table->decimal('mes_12');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
