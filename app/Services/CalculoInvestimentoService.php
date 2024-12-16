<?php 

namespace App\Services;

use App\Models\DadosInvestimento;
use App\Models\Empresa;
use App\Models\LucroEmpresa;
use App\Models\Dados;

class CalculoInvestimentoService {

    public function calcularDeposito($valorInvestir, $user) {

        if ($valorInvestir <= $user->deposito) {
            return true;
        } else {
            return false;
        }
    }

    public function calcularTempo($tempoInvestimento) {
        if ($tempoInvestimento <= 12) {
            return true;
        } else {
            return false;
        }
    }

    public function calcularInvestimentos($user, $valorInvestir, $tempoInvestimento, $empresaSelecionada) {
        $empresaEscolhida = Empresa::where('id' , $empresaSelecionada)->first();
        $valorEmpresa = $empresaEscolhida->valor_mercado;
        $empresa = $empresaEscolhida->nome_empresa;
        $ValorAcoes = $empresaEscolhida->preco_acao;
        $MinhasAcoes = intdiv($valorInvestir, $ValorAcoes);
        $jurosPorMes = [
            1 => $empresaEscolhida->mes_1, 2 => $empresaEscolhida->mes_2, 3 => $empresaEscolhida->mes_3, 4 => $empresaEscolhida->mes_4, 5 => $empresaEscolhida->mes_5, 6 => $empresaEscolhida->mes_6, 7 => $empresaEscolhida->mes_7, 8 => $empresaEscolhida->mes_8, 9 => $empresaEscolhida->mes_9, 10 => $empresaEscolhida->mes_10, 11 => $empresaEscolhida->mes_11, 12 => $empresaEscolhida->mes_12
        ];

        $lucroFinal = 0;
        for ($mes = 1; $mes <= $tempoInvestimento; $mes++) {
            $percentualJuros = $jurosPorMes[$mes] ?? 0; 
            $jurosMensal = (($valorInvestir * $percentualJuros) / 100);
            $lucroMensal = $valorInvestir + $jurosMensal;
            $valoresMensais[$mes] = [
                'juros' => $jurosMensal,
                'saldo' => $lucroMensal
            ];
            if ($mes == $tempoInvestimento) {
                $lucroFinal = $jurosMensal;
                $valorFinal = $lucroMensal;
            }
        }

        $inserirIvestimentos = DadosInvestimento::create([
            'id_user' => $user->id,
            'id_empresa' => $empresaSelecionada,
            'lucro' => $lucroFinal,
            'meu_investimento' => $valorInvestir,
            'minhas_acoes' => $MinhasAcoes,
            'tempo' => $tempoInvestimento,
            'valor_final' => $valorFinal
        ]);

        $meses = [];
        for ($mes = 1; $mes <= 12; $mes++) {
            $meses[] = isset($valoresMensais[$mes]) ? $valoresMensais[$mes]['saldo'] : 0;
        }

        $inserirLucro = LucroEmpresa::create([
            'id_empresa' => $empresaSelecionada,
            'id_investimento' => $inserirIvestimentos->id,
            'id_user' => $user->id,
            'valor_investido' => $valorInvestir,
            'mes_1' => $meses[0],
            'mes_2' => $meses[1],
            'mes_3' => $meses[2],
            'mes_4' => $meses[3],
            'mes_5' => $meses[4],
            'mes_6' => $meses[5],
            'mes_7' => $meses[6],
            'mes_8' => $meses[7],
            'mes_9' => $meses[8],
            'mes_10' => $meses[9],
            'mes_11' => $meses[10],
            'mes_12' => $meses[11],
        ]);

        if ($lucroFinal) {
            $deposito = Dados::find($user->id);
            $deposito->deposito = $deposito->deposito + $lucroFinal;
            $deposito->save();
        }
        return ;
    }
}
?>