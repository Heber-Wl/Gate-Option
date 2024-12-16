<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Mercado</title>
    <link rel="shortcut icon" href="img/ico.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('CSS/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/trabsacoes.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success alerta">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-error alerta">
                {{ session('error') }}
            </div>
        @endif
        <section class="sidebar">
            <div class="sidebar__menu">
                <a href="{{ asset('pagina-inicial') }}">
                    <img src="{{ asset('IMG/gateOption.png') }}" alt="Logo Gate Option" class="sidebar__logo">
                </a>
                <div class="sidebar__menu-items">
                    <a href="{{ route('pagina-inicial') }}" class="menu-item">
                        <img src="{{ asset('IMG/icons/align-justify.svg') }}" alt="Painel" class="menu-item__icon">
                        <span class="menu-item__label">Painel</span>
                    </a>
                    <a href="{{ route('mercado') }}" class="menu-item">
                        <img src="{{ asset('IMG/icons/chart-line.svg') }}" alt="Mercado" class="menu-item__icon">
                        <span class="menu-item__label">Mercado</span>
                    </a>
                    <a href="{{ route('transacoes') }}" class="menu-item">
                        <img src="{{ asset('IMG/icons/arrow-left-right.svg') }}" alt="Transações" class="menu-item__icon">
                        <span class="menu-item__label">Transações</span>
                    </a>
                    <a href="{{ route('investir') }}" class="menu-item">
                        <svg class="menu-item__icon investir" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m5.795 14.306l-1.772-1.775l-1.773 1.775m15.955-4.579l1.772 1.776l1.773-1.776"/><path d="M19.977 11.503c0-2.12-.84-4.151-2.336-5.65A7.97 7.97 0 0 0 12 3.513a7.9 7.9 0 0 0-2.97.577a7.98 7.98 0 0 0-4.555 4.75m-.452 3.69a8 8 0 0 0 1.827 5.082a7.97 7.97 0 0 0 9.966 1.927a8 8 0 0 0 3.585-4.034"/><path d="M9.58 13.978A2.28 2.28 0 0 0 12 16.054c1.952 0 2.42-1.123 2.42-2.076s-.807-1.963-2.42-1.963s-2.42-.638-2.42-1.938a2.22 2.22 0 0 1 1.537-2.003c.285-.092.585-.125.883-.097a2.33 2.33 0 0 1 2.42 2.1M12 17.264v-1.051m0-9.45v1.21"/></g></svg>
                        <span class="menu-item__label">Investir</span>
                    </a>
                </div>
            </div>
        </section>
        <div class="content">
            <section class="content__information">
                <div class="header">

                    <select class="header__filter" name="tradeSelector">
                        <option value="mock">Gráficos de Trades</option>
                    </select>
                </div>
                <div class="graphs">
                    <div class="graph graph--large">
                        <div class="graph__header">
                            <div class="graph__title-container">
                                <p class="graph__title">Investimentos totais</p>
                                <p class="graph__subtitle seta">R$ {{number_format(isset($meuSaldo->deposito) ? $meuSaldo->deposito : 0, 2, ',', '.')}}</p>
                            </div>

                        </div>
                        <canvas class="graph__content" height="280" id="graph1"></canvas>
                    </div>
                </div>
                <div class="actions">
                    <div class="tabela-mercado">
                        <div class="tabela-interior">
                            <h2>Histórico de Investimento</h1>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Valor Investido</th>
                                        <th>Tempo</th>
                                        <th>Ações</th>
                                        <th>Retorno</th>
                                    </tr>
                                </thead>
                                <tbody>
                                       @foreach ($investimento as $investir)
                                           <tr>
                                                <td>{{ $investir->empresa->nome_empresa}}</td>
                                                <td>{{ $investir->meu_investimento }}</td>
                                                <td>{{ $investir->tempo }}</td>
                                                <td>{{ $investir->minhas_acoes }}</td>
                                                <td>{{ $investir->valor_final }}</td>
                                           </tr>
                                       @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <aside class="toggle-aside">
            <div class="aside__content">
                <div class="aside-card">
                    <img src="https://img.migalhas.com.br/gf_Base/empresas/miga/imagens/5E260E50919130EB64FF0A749224AD38EF04_br.jpg" alt="Icon" class="aside-card__img">
                    <div class="aside-card__text">
                        <div class="aside-card__title_group">
                            <h2 class="aside-card__title">PETR4</h2>
                            <p class="table__data-profit">+02%</p>
                        </div>
                        <p class="aside-card__desc">Petroleo Brasileiro SA Petrobras Preference Shares
                        </p>
                    </div>
                </div>
            </div>
        </aside>
    </main>
    <script>
        function atualizarDeposito() {
            fetch('consultaDeposito.php')
                .then(response => response.json())
                .then(data => {
                    if (data.deposito) {
                        // Atualiza o valor do depósito na página
                        [...document.querySelectorAll('.seta')].forEach(element => {
                            element.textContent = 'R$ ' + parseFloat(data.deposito).toLocaleString('pt-BR', { minimumFractionDigits: 2 });
                        })
                    } else {
                        console.error('Erro:', data.error);
                    }
                })
                .catch(error => console.error('Erro na consulta do depósito:', error));
        }

        // Configura o intervalo para atualizar a cada 10 segundos
        setInterval(atualizarDeposito, 10000);

        // Executa a atualização ao carregar a página
        window.onload = atualizarDeposito;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script src="../assets/scripts/chart-config.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const lucrosAgrupadosPorMes = @json($mediaMensal);
            const ctx1 = document.getElementById('graph1').getContext('2d');
            const optBigGraph = {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    datasets: [{
                        label: 'Lucro',
                        data: lucrosAgrupadosPorMes,
                        fill: true,
                        borderColor: '#FD7100',
                        tension: 0.1,
                        backgroundColor: '#403024',
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false,
                            position: 'top'
                        },
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: 'white',
                                font: {
                                    size: 14
                                }
                            }
                        },
                        y: {
                            ticks: {
                                display: false
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            };
            new Chart(ctx1, optBigGraph);
        });
    </script>
    
</body>

</html>