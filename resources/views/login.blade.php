
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/images/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('CSS/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/login.css') }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login • Gate Option</title>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success alerta">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-error alerta">
            {{ session('error') }}
        </div>
    @endif
    <main>
        <form action="{{ route('verificarLogin') }}" method="POST" style="height: 100vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;">
            @csrf
            <div class="logint">
                <h1 class="tx-1">Login</h1>
                
            </div>
            <div class="boxs">
                <div class="label">
                    <label class="nome-la">EMAIL</label>
                    <input type="email" name="email" placeholder="Email" class="inputss" required>
                </div>
                <div class="label">
                    <label class="nome-la">SENHA</label>
                    <input type="password" name="password" placeholder="Senha" class="inputss" required>
                </div>
            </div>

            <h3 class="tx-2">Não tem Login? <a href="{{ route('cadastroLogin') }}" class="link-cds">Cadastre-se</a></h3>
            
            <input type="submit" value="Entrar" class="but-login" name="submit">
        </form>
    </main>
</body>
</html>