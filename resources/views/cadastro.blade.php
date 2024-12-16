<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/images/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('CSS/cadastro.css') }}">

    <title>Cadastre-se agora mesmo</title>
</head>
<body>
    <main class="main">
        <form action="{{ route('cadastrarUsuario') }}" method="POST" style="height: 100vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;">
            @csrf
            <div class="novouser">
                <h1 class="tx1">Criar Nova Conta</h1>
            </div>
            <div class="inputs">
                <div class="container-input">
                    <label class="nome">NOME</label>
                    <input type="text" placeholder="Nome" class="inputs1" name="nome" required>
                </div>
                <div  class="container-input">
                    <label class="nome">EMAIL</label>
                    <input type="email" placeholder="Email" class="inputs1" name="email" required>
                </div>
                <div  class="container-input">
                    <label class="nome">SENHA</label>
                    <input type="password" placeholder="Senha" class="inputs1" name="password" required>
                </div>
                <div>
                    <div class="container-input">
                        <label class="nome">DATA DE NASCIMENTO</label>
                        <input type="date" name="dataNas" id="dataNas" required>
                    </div>
                </div>
            </div>
            <h3 class="tx2">Já tem Cadastro? <a href="{{ route('login') }}" class="login">Login</a></h3>
            <input type="submit" name="submit" value="Entrar" class="but-entrar">
        </form>
    </main>
</body>
</html>