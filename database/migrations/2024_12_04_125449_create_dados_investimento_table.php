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
        Schema::create('dados_investimento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('dados', 'id');
            $table->foreignId('id_empresa')->constrained('empresas','id');
            $table->string('lucro');
            $table->string('meu_investimento');
            $table->string('minhas_acoes');
            $table->string('tempo');
            $table->decimal('valor_final');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_investimento');
    }
};
