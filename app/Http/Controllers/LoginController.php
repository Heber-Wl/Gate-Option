<?php

namespace App\Http\Controllers;

use App\Models\Dados;
use App\Models\DadosInvestimento;
use App\Models\Empresa;
use App\Models\LucroEmpresa;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Services\CalculoInvestimentoService;

class LoginController extends Controller
{

    protected $calculoInvestimentoService;

    public function __construct(CalculoInvestimentoService $calculoInvestimentoService)
    {
        $this->calculoInvestimentoService = $calculoInvestimentoService;
    }

    public function home() {
        
        return view('index');
    }

    public function cadastroLogin() {

        return view('cadastro');
    }

    public function cadastrarUsuario(Request $request) {

        Dados::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'data_nas' => $request->dataNas,
            'deposito' => 0
        ]);

        return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso !');
    }
    public function login() {
        
        return view('login');
    }

    public function verificarLogin(Request $request) {

        try {
            $informacoesForm = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];


            if (Auth::attempt($informacoesForm)) {
                $request->session()->regenerate();
                return redirect()->route('pagina-inicial')->with('success', 'Login realizado com sucesso!');
            }
            
            return redirect()->back()->with('error', 'Usuário ou senha errados.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } 
    }

    

    public function pgInicial() {

        $user = Auth::user();

        $userId = Auth::user()->id;
        $meuSaldo = Dados::find($userId);

        $investimento = DadosInvestimento::with(['empresa', 'usuario'])
            ->select()
            ->where('id_user', $userId)
            ->get();

        $valorInvestimento = LucroEmpresa::where('id_user', $userId)->get();

        $mediaMensal = array_fill(0, 12, 0);

        foreach ($valorInvestimento as $valor) {
            $mediaMensal[0] += $valor->mes_1;
            $mediaMensal[1] += $valor->mes_2;
            $mediaMensal[2] += $valor->mes_3;
            $mediaMensal[3] += $valor->mes_4;
            $mediaMensal[4] += $valor->mes_5;
            $mediaMensal[5] += $valor->mes_6;
            $mediaMensal[6] += $valor->mes_7;
            $mediaMensal[7] += $valor->mes_8;
            $mediaMensal[8] += $valor->mes_9;
            $mediaMensal[9] += $valor->mes_10;
            $mediaMensal[10] += $valor->mes_11;
            $mediaMensal[11] += $valor->mes_12;
        }

        $lucros = count($valorInvestimento);
        if ($lucros > 0) {
            for ($i = 0; $i < 12; $i++) {
                $mediaMensal[$i] /= $lucros;
            }
        }

        return view('paginaInicial', [
            'user' => $user,
            'valorInvestimento' => $valorInvestimento,
            'mediaMensal' => $mediaMensal,
            'investimento' => $investimento,
            'meuSaldo' => $meuSaldo
        ]);
    }

    public function mercado() {

        $empresas = Empresa::all();

        return view('mercado', [
            'empresas' => $empresas
        ]);
    }

    public function transacoes() {

        $user = Auth::user()->id;
        $meuSaldo = Dados::find($user);

        $investimento = DadosInvestimento::with(['empresa', 'usuario'])
            ->select()
            ->where('id_user', $user)
            ->get();

        $valorInvestimento = LucroEmpresa::where('id_user', $user)->get();

        $mediaMensal = array_fill(0, 12, 0);

        foreach ($valorInvestimento as $valor) {
            $mediaMensal[0] += $valor->mes_1;
            $mediaMensal[1] += $valor->mes_2;
            $mediaMensal[2] += $valor->mes_3;
            $mediaMensal[3] += $valor->mes_4;
            $mediaMensal[4] += $valor->mes_5;
            $mediaMensal[5] += $valor->mes_6;
            $mediaMensal[6] += $valor->mes_7;
            $mediaMensal[7] += $valor->mes_8;
            $mediaMensal[8] += $valor->mes_9;
            $mediaMensal[9] += $valor->mes_10;
            $mediaMensal[10] += $valor->mes_11;
            $mediaMensal[11] += $valor->mes_12;
        }

        $lucros = count($valorInvestimento);
        if ($lucros > 0) {
            for ($i = 0; $i < 12; $i++) {
                $mediaMensal[$i] /= $lucros;
            }
        }

        // dd($mediaMensal);

        return view('transacoes', [
            'user' => $user,
            'valorInvestimento' => $valorInvestimento,
            'mediaMensal' => $mediaMensal,
            'investimento' => $investimento,
            'meuSaldo' => $meuSaldo
        ]);
    }

    public function investir() {
        return view('investir');
    }

    public function depositar(Request $request) {
        try {
            $dados = Dados::find(Auth::user()->id);

            if ($request->depositoInvestir > 19) {
                $dados->deposito = $dados->deposito + $request->depositoInvestir;
                $dados->save();

                return redirect()->route('pagina-inicial')->with('success', 'Seu deposito foi um sucesso !');
            }
            return redirect()->back()->with('error', 'Valor deve ser maior que R$ 20');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }  
    }

    public function investirEmpresa(Request $request) {

        $user = Auth::user();
        $valorInvestir = $request->investimento;
        $tempoInvestimento = $request->tempo;
        $empresaSelecionada = $request->empresas;


        $calcular = $this->calculoInvestimentoService->calcularDeposito($valorInvestir, $user);
        if($calcular == false){
            return redirect()->back()->with('error', 'Valor não pode ser investido !');
        }

        $calcularTempo = $this->calculoInvestimentoService->calcularTempo($tempoInvestimento);
        if($calcularTempo == false){
            return redirect()->back()->with('error', 'Tempo maior que 12 meses !');
        }

        try {

            $calcularValorInvestido = $this->calculoInvestimentoService->calcularInvestimentos($user, $valorInvestir, $tempoInvestimento, $empresaSelecionada);

            return redirect()->route('transacoes')->with('success', 'Seu investimento foi um sucesso !');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }  
    }

    public function sair() {

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
