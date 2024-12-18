<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>

    <link rel="shortcut icon" href="img/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('CSS/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/paginaInicial.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main>
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
                <a href="{{ asset('/') }}">
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
        <div class="div-2">
            <div class="barra2">
                <div class="bemvindo">
                    <h4 class="bemv">Bem vindo !</h4>
                    <div class="div-btn-user">
                        <button type="button" class="btn-user"  data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <div class="linha-user" >
                                <svg class="imguser" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="white" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2M8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0m9.758 7.484A7.99 7.99 0 0 1 12 20a7.99 7.99 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984"/></g></svg>
                                <label for="" class="lab-user-tex">{{ $user->nome }}</label>
                            </div>
                        </button>
                     
                        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title deposito sair" id="depositModalLabel"><span><svg class="imguser sair" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="white" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2M8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0m9.758 7.484A7.99 7.99 0 0 1 12 20a7.99 7.99 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984"/></g></svg></span> {{ $user->nome}}</h5>
                                    </div>
                                    <div class="input-modal depositar">
                                        <form action="{{ route('sair') }}" method="POST">
                                            @csrf
                                            <div class="mb-3 iput">
                                                <label for="depositAmount" class="form-label deposito sair">Deseja realmente sair da sua conta</label>
                                            </div>
                                            <div class="div-btn-depositar">
                                                <button type="submit" class="btn btn-primary depositar sair" name="submit">Sair</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portifolio">
                    <h3 class="port">Potfólio de ações</h3>
                    <button type="button" class="btn-deposito" data-bs-toggle="modal" data-bs-target="#depositModal">
                        <div class="vertudo">
                            <h5 class="tudo">Meu Saldo: </h5>
                            <h4 class="seta">R$ {{number_format(isset($user->deposito) ? $user->deposito : 0, 2, ',', '.')}}</h4>
                        </div>
                    </button>
                    <div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header deposito">
                                    <h5 class="modal-title deposito" id="depositModalLabel">Depósito</h5>
                                </div>
                                <div class="input-modal depositar">
                                    <form action="{{ route('depositar') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 iput">
                                            <label for="depositAmount" class="form-label deposito">Quanto deseja depositar?</label>
                                            <input type="number" class="form-control depositar" id="depositAmount" name="depositoInvestir" required>
                                        </div>
                                        <div class="div-btn-depositar">
                                            <button type="submit" class="btn btn-primary depositar" name="submit">Depositar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="graphs__content">
            <div class="div-grafcos1">
                <div class="card-graph">
                    <div class="card-grap-header-title-container">
                        <p class="card-graph-title">Petrobrás</p>
                    </div>

                    <div class="card-grap-header-title-container">
                        <p class="card-graph-subtitle bold">R$ 36,00</p>
                        <p class="card-grap-porcentagem-subiu">+1,69%</p>
                    </div>
                    <canvas height="120" id="graph1"></canvas>
                </div>

                <div class="card-graph">
                    <div class="card-grap-header-title-container">
                        <p class="card-graph-title">Itaú</p>
                    </div>

                    <div class="card-grap-header-title-container">
                        <p class="card-graph-subtitle bold">R$ 33,30</p>
                        <p class="card-grap-porcentagem-subiu">+5,13%</p>
                    </div>
                    <canvas height="120" id="graph2"></canvas>
                </div>


                <div class="card-graph">
                    <div class="card-grap-header-title-container">
                        <p class="card-graph-title">Vale</p>
                    </div>

                    <div class="card-grap-header-title-container">
                        <p class="card-graph-subtitle bold">R$ 61,17</p>
                        <p class="card-grap-porcentagem-desceu">-11,86%</p>
                    </div>
                    <canvas height="120" id="graph3"></canvas>
                </div>
            </div>
            <div class="div-graficos2">
                <div class="card-big-graph">
                    <div>
                        <div class="big-graph-header">
                            <div class="big-graph-title-container">
                                <p class="big-graph-title">Investimentos totais</p>
                                <p class="big-graph-subtitle bold seta">R$ {{number_format(isset($user->deposito) ? $user->deposito : 0, 2, ',', '.')}}</p>
                            </div>
                        </div>
                    </div>
                    <canvas height="240" id="graph4"></canvas>
                </div>
                <div class="imglistaEmmpresas">
                    <h3>Gráfico Ações</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Ação</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Petrobrás</td>
                                <td>R$ 36,00</td>
                                <td class="positivo">1,69</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Itaú</td>
                                <td>R$ 33,30</td>
                                <td class="positivo">5,13</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Vale</td>
                                <td>R$ 61,17</td>
                                <td class="negativo">-11,8</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Ambev</td>
                                <td>R$ 12,39</td>
                                <td class="negativo">-0,36</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>BTG</td>
                                <td>R$ 36,00</td>
                                <td class="negativo">-6,60</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>B Brasil</td>
                                <td>R$ 55,30</td>
                                <td class="positivo">13,46</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

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
        setInterval(atualizarDeposito, 10000);
        window.onload = atualizarDeposito;
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx1 = document.getElementById('graph1').getContext('2d');
            const ctx2 = document.getElementById('graph2').getContext('2d');
            const ctx3 = document.getElementById('graph3').getContext('2d');
            const ctx4 = document.getElementById('graph4').getContext('2d');

            const valoresEmpresas = [
                [1.69, -2.18, 12.13, 27.06, 30.83, 37.01, 36.20, 47.79, 36.47, 51.09, 61.45, 67.34],
                [5.13, 4.94, 18.79, 19.86, 11.56, 7.12, 5.89, 23.53, 30.19, 25.04, 28.75, 30.12],
                [-11.86, -11.56, -4.45, -10.12, -6.45, -4.12, 3.56, 11.76, -1.45, -2.89, -4.8, 2.89],
                [-0.36, 13.20, 12.89, 1.78, -4.78, -5.99, 3.52, 6.1, 1.45, -2.78, -2.89, -4.55],
                [-6.60, -8.24, -10.24, -20.46, -10.14, -5.56, -9.47, -7.92, 1.56, 2.85, -2.30, 7.45],
                [13.46, 11.01, 10.92, 11.12, 13.45, 29.40, 31.93, 33.45, 37.12, 36.47, 32.23, 30.41],
                [-8.54, -8, -3.13, -13.45, -12.14, -8.56, -1.56, -13.79, 1.5, 5.96, 8.47, 11.78],
                [7, 18.83, 20.13, 9.78, 4.98, 2.06, 18.25, 25.25, 14.78, 4.69, 8.27, 5.29],
                [-7.49, 8.09, 16.72, 12.75, 9.91, 6.45, 19.67, 20.4, 17.02, 19.77, 37.53, 36.45],
                [1.14, 12.53, 15, 9.74, 8.93, 4.96, 23.43, 29.79, 26.22, 29.22, 31.16, 22.21],
            ];

            const opt = {
                type: 'line',
                data: {
                    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
                    datasets: [{
                        label: 'Status (%)',
                        data: [],
                        fill: true,
                        borderColor: '#FD7100',
                        tension: 0.1,
                        backgroundColor: '#403024'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false, position: 'top' },
                    },
                    scales: {
                        x: { ticks: { display: false }, grid: { display: false } },
                        y: { ticks: { display: false }, grid: { display: false } }
                    }
                }
            };

            const optEmpresa1 = JSON.parse(JSON.stringify(opt));
            optEmpresa1.data.datasets[0].data = valoresEmpresas[0];

            const optEmpresa2 = JSON.parse(JSON.stringify(opt));
            optEmpresa2.data.datasets[0].data = valoresEmpresas[1];

            const optEmpresa3 = JSON.parse(JSON.stringify(opt));
            optEmpresa3.data.datasets[0].data = valoresEmpresas[2];

            const lucrosAgrupadosPorMes = @json($mediaMensal);

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
                        legend: { display: false, position: 'top' },
                    },
                    scales: {
                        x: {
                            ticks: { color: 'white', font: { size: 14 } }
                        },
                        y: {
                            ticks: { display: false },
                            grid: { display: false }
                        }
                    }
                }
            };

            new Chart(ctx1, optEmpresa1);
            new Chart(ctx2, optEmpresa2);
            new Chart(ctx3, optEmpresa3);
            new Chart(ctx4, optBigGraph);
        });
    </script>
    <script>
        function toggleSair() {
            const modal = document.getElementById('logoutModal');
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>